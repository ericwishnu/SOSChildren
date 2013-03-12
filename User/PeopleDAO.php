<?php

include '../Database/Config.php';
include 'User.php';
include 'PostData.php';
include 'Foundation.php';
class PeopleDAO {
    
    private $conf;
    
    function searchpeople_db ($searchby, $keyword) {
        
        $resultArray;
        $this->conf = new Config();
        $this->conf->db_connect();

        $query = "SELECT * FROM Sponsor WHERE $searchby LIKE '%$keyword%'";
        $result = $this->conf->db_query($query);

        if (mysql_num_rows($result) > 0) {
            while ($row = mysql_fetch_array($result, MYSQL_NUM)) {

                $resultArray[] = new User($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10], $row[11]);
            }
            $this->conf->db_close();
            return $resultArray;
        }
    }
    
    function listneighbours_db ($sponsorID) {
        $resultArray;
        $this->conf = new Config();
        $this->conf->db_connect();
        
        $query = "SELECT * FROM Neighbours WHERE UserID1 = '$sponsorID' AND Relationship != 'Pending'";
        $result = $this->conf->db_query($query);
        
        while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
            
            $query1 = "SELECT * FROM Sponsor WHERE SponsorID = '$row[2]'";
            $result1 = $this->conf->db_query($query1);
            
            if(mysql_num_rows($result1)> 0)
            {
                $row1 = mysql_fetch_array($result1);
                
                $resultArray[] = new User($row1[0], $row1[1], $row1[2], $row1[3], $row1[4], $row1[5], $row1[6], $row1[7], $row1[8], $row1[9], $row1[10], $row1[11]);
            }
        }
        
        $query2 = "SELECT * FROM Neighbours WHERE UserID2 = '$sponsorID' AND Relationship != 'Pending'";
        $result2 = $this->conf->db_query($query2);
        
        while ($row2 = mysql_fetch_array($result2, MYSQL_NUM)) {
            
            $query3 = "SELECT * FROM Sponsor WHERE SponsorID = '$row2[1]'";
            $result3 = $this->conf->db_query($query3);
            
            if(mysql_num_rows($result3)> 0)
            {
                $row3 = mysql_fetch_array($result3);
                
                $resultArray[] = new User($row3[0], $row3[1], $row3[2], $row3[3], $row3[4], $row3[5], $row3[6], $row3[7], $row3[8], $row3[9], $row3[10], $row3[11]);
            }
        }
        
        $this->conf->db_close();
        return $resultArray;
        
    }
    
    function peopleprofile_db($peopleID) {
        $this->conf = new Config();
        $this->conf->db_connect();

        $query = "SELECT * FROM Sponsor WHERE SponsorID = '$peopleID'";
        $result = $this->conf->db_query($query);

        if (mysql_num_rows($result) > 0) {
            $temp = mysql_fetch_array($result);
            return new User($temp[0], $temp[1], $temp[2], $temp[3], $temp[4], $temp[5], $temp[6], $temp[7], $temp[8], $temp[9], $temp[10], $temp[11]);
        }

        return null;    
    }
    
    function seeneighbourship_db($username, $peopleID) {
        $this->conf = new Config();
        $this->conf->db_connect();

        $query = "SELECT Relationship FROM Neighbours WHERE UserID1 = '$username' AND UserID2 = '$peopleID' OR UserID1 = '$peopleID' AND UserID2 = '$username'";
        $result = $this->conf->db_query($query);

        if (mysql_num_rows($result) > 0) {
            $temp = mysql_fetch_array($result);
            return $temp[0];
        }

        return null;    
    }
    
    function addneighbour_db($sponsorID, $friendID) {
        
        $this->conf = new Config();
        $this->conf->db_connect();

        $query = "INSERT INTO Neighbours (UserID1, UserID2, Relationship) VALUES ('$sponsorID','$friendID','Pending')";
        
        $result = $this->conf->db_query($query);
        
        if (!$result) {
            throw new Exception('Could not register it in database - please try again later.\n');
            return false;
        }
        
        return true;
        
    }
    
    function neighbourrequest_db ($sponsorID) {
        $resultArray;
        $this->conf = new Config();
        $this->conf->db_connect();
        
        $query = "SELECT * FROM Neighbours WHERE UserID2 = '$sponsorID' AND Relationship = 'Pending'";
        $result = $this->conf->db_query($query);
        
        while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
            
            $query1 = "SELECT * FROM Sponsor WHERE SponsorID = '$row[1]'";
            $result1 = $this->conf->db_query($query1);
            
            if(mysql_num_rows($result1)> 0)
            {
                $row1 = mysql_fetch_array($result1);
                
                $resultArray[] = new User($row1[0], $row1[1], $row1[2], $row1[3], $row1[4], $row1[5], $row1[6], $row1[7], $row1[8], $row1[9], $row1[10], $row1[11]);
            }
        }
        
        $this->conf->db_close();
        return $resultArray;
        
    }
    
    function editrelationship_db($sponsorID, $friendID, $relationship) {
        
        $this->conf = new Config();
        $this->conf->db_connect();
        
        $query = "UPDATE Neighbours SET Relationship='$relationship' 
            WHERE UserID1='$sponsorID' AND UserID2='$friendID' OR UserID1='$friendID' AND UserID2='$sponsorID'";
        $result = $this->conf->db_query($query);
        if (!$result) {
            throw new Exception('Update failed - please try again later.\n');
            return false;
        }
        return true;
    }
    
    function removeneighbour_db($sponsorID, $friendID) {
        
        $this->conf = new Config();
        $this->conf->db_connect();
        
        $query = "DELETE FROM Neighbours WHERE UserID1='$sponsorID' AND UserID2='$friendID' OR UserID1='$friendID' AND UserID2='$sponsorID'";
        $result = $this->conf->db_query($query);
        if (!$result) {
            throw new Exception('Update failed - please try again later.\n');
            return false;
        }
        return true;
    }
    
    function sendmessage_db($sponsorID, $friendID, $messagecontent) {
        
        $this->conf = new Config();
        $this->conf->db_connect();

        $query = "INSERT INTO Message (UserFrom, UserDestination, MessageContent, DateTime) VALUES ('$sponsorID','$friendID','$messagecontent',NOW())";
        
        $result = $this->conf->db_query($query);
        
        if (!$result) {
            throw new Exception('Could not register it in database - please try again later.\n');
            return false;
        }
        
        return true;
        
    }
    
    function listmessage_db($sponsorID) {
        
        
    }
    
    function viewmessagecontent_db($sponsorID, $friendID) {
        
        
        
    }
    
    function deletemessage_db($sponsorID, $friendID) {
        
    }
    
    function addpost_db($sponsorID, $postcontent) {
        $this->conf = new Config();
        $this->conf->db_connect();
        $sharedstatus = 'public';
        $query = "INSERT INTO UserPost (UserID, PostContent, DateTime, SharedStatus) VALUES ( '$sponsorID' , '$postcontent', NOW(), '$sharedstatus')";
        $result = $this->conf->db_query($query);

        if (!$result) {
            throw new Exception('Could not register it in database - please try again later.\n');
            return false;
        }
        return true;
    }
    
    function viewpersonalpost_db($userID, $usertype) {
        
        if($usertype == 'Sponsor'){
            $resultArray;
            $this->conf = new Config();
            $this->conf->db_connect();

            $query = "SELECT UserPost.*, Sponsor.Name FROM UserPost, Sponsor WHERE UserPost.UserID = '$userID' AND Sponsor.SponsorID = '$userID' ORDER BY UserPost.DateTime DESC";
            $result = $this->conf->db_query($query);

            if (mysql_num_rows($result) > 0) {

                while ($row = mysql_fetch_array($result, MYSQL_NUM)) {

                    //PostData (usertype, userID-1, $name, $title, $photo-2, $postcontent-3, $datetime-4, userpostID)
                    $resultArray[] = new PostData('Sponsor', $row[1], $row[6], ' ', $row[2], $row[3], $row[4], $row[0]);
                }

                $this->conf->db_close();

                return $resultArray;
            }
        }
        elseif ($usertype == 'Foundation') {
            $resultArray;
            $this->conf = new Config();
            $this->conf->db_connect();

            $query = "SELECT FoundationPost.*, Foundation.Name FROM FoundationPost, Foundation WHERE FoundationPost.FoundationID = '$userID' AND Foundation.FoundationID = '$userID'  ORDER BY FoundationPost.DateTime DESC";
            $result = $this->conf->db_query($query);

            if (mysql_num_rows($result) > 0) {

                while ($row = mysql_fetch_array($result, MYSQL_NUM)) {

                    //PostData (usertype, userID-1, $name, $title, $photo-2, $postcontent-3, $datetime-4, userpostID)
                    $resultArray[] = new PostData('Foundation', $row[5], $row[8], $row[1], $row[2], $row[4], $row[3], $row[0]);
                }

                $this->conf->db_close();

                return $resultArray;
            }
        }
    }
    
    function deletepost_db($sponsorID, $userpostID) {
        $this->conf = new Config();
        $this->conf->db_connect();
        
        $query = "DELETE FROM UserPost WHERE UserPostID = $userpostID AND UserID = '$sponsorID'";
        $result = $this->conf->db_query($query);

        if (!$result) {
            throw new Exception('Could not register it in database - please try again later.\n');
            return false;
        }
        return true;
    }
    
    function viewnewsfeed_db($sponsorID) {
        
        $resultArray;
        $this->conf = new Config();
        $this->conf->db_connect();

        $query = "SELECT UserPost.*, Sponsor.Name FROM UserPost, Sponsor WHERE UserPost.UserID = '$sponsorID' AND Sponsor.SponsorID = '$sponsorID' ORDER BY UserPost.DateTime DESC";
        $result = $this->conf->db_query($query);

        if (mysql_num_rows($result) > 0) {

            while ($row = mysql_fetch_array($result, MYSQL_NUM)) {

                //PostData (usertype, userID-1, $name, $title, $photo-2, $postcontent-3, $datetime-4, userpostID)
                $resultArray[] = new PostData('Sponsor', $row[1], $row[6], ' ', $row[2], $row[3], $row[4], $row[0]);
            }
        }
        
        $query1 = "SELECT UserPost.*, Sponsor.Name FROM UserPost, Sponsor WHERE
                    UserPost.UserID = SOME (SELECT SponsorID FROM Sponsor WHERE
                        SponsorID = SOME (SELECT UserID1 FROM Neighbours WHERE UserID2 = '$sponsorID' AND Relationship != 'Pending') OR
                        SponsorID = SOME (SELECT UserID2 FROM Neighbours WHERE UserID1 = '$sponsorID' AND Relationship != 'Pending')) 
                    AND Sponsor.SponsorID = UserPost.UserID 
                    ORDER BY UserPost.DateTime DESC";
        $result1 = $this->conf->db_query($query1);

        if (mysql_num_rows($result1) > 0) {

            while ($row1 = mysql_fetch_array($result1, MYSQL_NUM)) {

                $resultArray[] = new PostData('Sponsor', $row1[1], $row1[6], ' ', $row1[2], $row1[3], $row1[4], $row1[0]);
            }
        }
        
        $query2 = "SELECT FoundationPost.*, Foundation.Name FROM FoundationPost, Foundation WHERE
                    FoundationPost.FoundationID = SOME (SELECT FoundationID FROM Foundation WHERE
                        FoundationID = SOME (SELECT FoundationID FROM Donorship WHERE SponsorID = '$sponsorID')) 
                    AND Foundation.FoundationID = FoundationPost.FoundationID 
                    ORDER BY FoundationPost.DateTime DESC";
        $result2 = $this->conf->db_query($query2);

        if (mysql_num_rows($result2) > 0) {

            while ($row2 = mysql_fetch_array($result2, MYSQL_NUM)) {

                $resultArray[] = new PostData('Sponsor', $row2[1], $row2[6], ' ', $row2[2], $row2[3], $row2[4], $row2[0]);
            }
           
        }
        
        $this->conf->db_close();

        return $resultArray;
        
    }
    
    function viewnewsfeedfromneighbour_db($sponsorID) {
        $resultArray;
        $this->conf = new Config();
        $this->conf->db_connect();

        $query = "SELECT UserPost.*, Sponsor.Name FROM UserPost, Sponsor WHERE
                    UserPost.UserID = SOME (SELECT SponsorID FROM Sponsor WHERE
                        SponsorID = SOME (SELECT UserID1 FROM Neighbours WHERE UserID2 = '$sponsorID' AND Relationship != 'Pending') OR
                        SponsorID = SOME (SELECT UserID2 FROM Neighbours WHERE UserID1 = '$sponsorID' AND Relationship != 'Pending')) 
                    AND Sponsor.SponsorID = UserPost.UserID 
                    ORDER BY UserPost.DateTime DESC";
        $result = $this->conf->db_query($query);

        if (mysql_num_rows($result) > 0) {

            while ($row = mysql_fetch_array($result, MYSQL_NUM)) {

                $resultArray[] = new PostData('Sponsor', $row[1], $row[6], ' ', $row[2], $row[3], $row[4], $row[0]);
            }

            $this->conf->db_close();

            return $resultArray;
        }
    }
    
    function viewnewsfeedfromfoundation_db($sponsorID){
        $resultArray;
        $this->conf = new Config();
        $this->conf->db_connect();

        $query = "SELECT FoundationPost.*, Foundation.Name FROM FoundationPost, Foundation WHERE
                    FoundationPost.FoundationID = SOME (SELECT FoundationID FROM Foundation WHERE
                        FoundationID = SOME (SELECT FoundationID FROM Donorship WHERE SponsorID = '$sponsorID')) 
                    AND Foundation.FoundationID = FoundationPost.FoundationID 
                    ORDER BY FoundationPost.DateTime DESC";
        $result = $this->conf->db_query($query);

        if (mysql_num_rows($result) > 0) {

            while ($row = mysql_fetch_array($result, MYSQL_NUM)) {

                $resultArray[] = new PostData('Sponsor', $row[5], $row[6], ' ', $row[2], $row[3], $row[4], $row[0]);
            }

            $this->conf->db_close();
            
           return $resultArray;
        }
    }


function globalsearchfoundation_db($searchby, $keyword){
        
        $resultArray;
        $this->conf = new Config();
        $this->conf->db_connect();

        $query = "SELECT * FROM Foundation WHERE FoundationID LIKE '%$keyword%' OR Name LIKE '%$keyword%' OR City LIKE '%$keyword%' OR Country LIKE '%$keyword%' GROUP BY FoundationID";
        $result = $this->conf->db_query($query);

        if (mysql_num_rows($result) > 0) {
            while ($row = mysql_fetch_array($result, MYSQL_NUM)) {

                $resultArray[] = new Foundation($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10], $row[11]);
            }
            $this->conf->db_close();
            return $resultArray;
        }
    }

function globalsearchpeople_db ($keyword) {
        
        $resultArray;
        $this->conf = new Config();
        $this->conf->db_connect();

        $query = "SELECT * FROM Sponsor WHERE SponsorID LIKE '%$keyword%' OR Name LIKE '%$keyword%' OR City LIKE '%$keyword%' OR Country LIKE '%$keyword%' GROUP BY SponsorID";
        $result = $this->conf->db_query($query);

        if (mysql_num_rows($result) > 0) {
            while ($row = mysql_fetch_array($result, MYSQL_NUM)) {

                $resultArray[] = new User($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10], $row[11]);
            }
            $this->conf->db_close();
            return $resultArray;
        }
    }

    
}

?>
