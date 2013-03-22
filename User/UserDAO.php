<?php

include '../Database/Config.php';
include 'User.php';
include 'PostData.php';

class UserDAO {

    private $conf;

    function login_db($username, $password) {
        $this->conf = new Config();
        $this->conf->db_connect();

        $query = "SELECT * FROM Sponsor WHERE SponsorID = '$username' AND Password = md5('$password')";
        $result = $this->conf->db_query($query);

        if (mysql_num_rows($result) > 0) {
            return true;
        }
        return false;
    }

    function signup_db($sponsorID, $password, $email, $name, $address, $city, $state, $country, $postalcode, $phone, $urlphoto) {
        $this->conf = new Config();
        $this->conf->db_connect();

        $query = "SELECT * FROM Sponsor WHERE SponsorID = '$sponsorID'";
        $result = $this->conf->db_query($query);

        if (!$result) {
            throw new Exception('Could not execute query<br>');
        }
        if (mysql_num_rows($result) > 0) {
            //throw new Exception('That username is taken - go back and choose another one.\n');
            return false;
        }

        $query = "INSERT INTO Sponsor (SponsorID, Password, Email, Name, Address, City, State, Country, PostalCode, Phone, Coins, Photo) 
            VALUES ('$sponsorID', md5('$password'), '$email', '$name', '$address', '$city', '$state', '$country', '$postalcode', '$phone', 100, '$urlphoto')";
        $result = $this->conf->db_query($query);

        if (!$result) {
            throw new Exception('Could not register you in database - please try again later.\n');
        }

        return true;
    }

    function accountinfo_db($userID) {
        $this->conf = new Config();
        $this->conf->db_connect();

        $query = "SELECT * FROM Sponsor WHERE SponsorID = '$userID'";
        $result = $this->conf->db_query($query);

        if (mysql_num_rows($result) > 0) {
            $temp = mysql_fetch_array($result);
            return new User($temp[0], $temp[1], $temp[2], $temp[3], $temp[4], $temp[5], $temp[6], $temp[7], $temp[8], $temp[9], $temp[10]);
        }

        return null;
    }

    function changesettings_db($username, $password, $email, $name, $address, $city, $state, $country, $postalCode, $phone) {
        $this->conf = new Config();
        $this->conf->db_connect();

        $query = "UPDATE Sponsor SET 
                    Password = md5('$password'),
                    Email = '$email',
                    Name = '$name',
                    Address = '$address',
                    City = '$city',
                    State = '$state',
                    Country = '$country',
                    PostalCode = '$postalCode',
                    Phone = '$phone' 
                 WHERE SponsorID = '$username'";
        $result = $this->conf->db_query($query);
        if (!$result) {
            throw new Exception('Update failed - please try again later.\n');
        }
        return true;
    }

    function editprofile_db($username, $name, $address, $city, $state, $country, $postalCode, $email, $phone) {
        $this->conf = new Config();
        $this->conf->db_connect();

        $query = "UPDATE Sponsor SET 
                    Name = '$name',
                    Address = '$address',
                    City = '$city',
                    State = '$state',
                    Country = '$country',
                    Postalcode = '$postalCode',    
                    Email = '$email', 
                    Phone = '$phone'
                 WHERE SponsorID = '$username'";
        $result = $this->conf->db_query($query);
        if (!$result) {
            throw new Exception('Update failed - please try again later.\n');
        }
        return true;
    }

    function changepassword_db($username, $password) {
        $this->conf = new Config();
        $this->conf->db_connect();

        $query = "UPDATE Sponsor SET 
                    Password = md5('$password')
                 WHERE SponsorID = '$username'";
        $result = $this->conf->db_query($query);
        if (!$result) {
            throw new Exception('Update failed - please try again later.\n');
        }
        return true;
    }

    function changepicture_db($username, $photo) {
        $this->conf = new Config();
        $this->conf->db_connect();

        $query = "UPDATE Sponsor SET 
                    Photo = '$photo'
                 WHERE SponsorID = '$username'";
        $result = $this->conf->db_query($query);
        if (!$result) {
            throw new Exception('Update failed - please try again later.\n');
        }
        return true;
    }

    function addPost_db($sponsorID, $postcontent, $urlfile) {
        $this->conf = new Config();
        $this->conf->db_connect();
        $sharedstatus = 'public';
        $postcontent = addslashes($postcontent);
        $query = "INSERT INTO userpost (UserID,Photo, PostContent, DateTime, SharedStatus)
            VALUES ( '$sponsorID' ,'$urlfile', '$postcontent', NOW(), '$sharedstatus')";
        $result = $this->conf->db_query($query);

        if (!$result) {
            throw new Exception('Could not register it in database - please try again later.\n');
            return false;
        }
        return true;
    }

    function addPostNoPhoto_db($sponsorID, $content) {
        $this->conf = new Config();
        $this->conf->db_connect();
        $sharedstatus = 'public';
        $content = addslashes($content);
        $query = "INSERT INTO userpost (UserID, PostContent, DateTime, SharedStatus) 
           VALUES ( '$sponsorID' , '$content', NOW(), '$sharedstatus')";

        $result = $this->conf->db_query($query);

        if (!$result) {
            throw new Exception('Could not register it in database - please try again later.\n');
            //return false;
        }
        //return true;
    }

    function listPost_db($sponsorID) {
        $resultArray;
        $this->conf = new Config();
        $this->conf->db_connect();

        $query = "SELECT * FROM userpost WHERE UserID = '$sponsorID'";
        $result = $this->conf->db_query($query);

        if (mysql_num_rows($result) > 0) {
            while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
                //post id, userid, photo, post content, date time, status
                $resultArray[] = array($row[0], $row[1], $row[2], $row[3], $row[4], $row[5]);
            }
            $this->conf->db_close();
            return $resultArray;
        }
    }

    function deletePost_db($postid) {
        $this->conf = new Config();
        $this->conf->db_connect();
        $query = "DELETE FROM userpost WHERE UserPostID='$postid'";
        $result = $this->conf->db_query($query);
        if (!$result) {
            throw new Exception('Update failed - please try again later.\n');
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

                $resultArray[] = new PostData('Foundation', $row2[5], $row2[7], ' ', $row2[2], $row2[4], $row2[3], $row2[0]);
            }
        }

        $this->conf->db_close();

        return $resultArray;
    }

    function getuserdata_db($sponsorID){
        $this->conf = new Config();
        $this->conf->db_connect();

        $query = "SELECT SponsorID, Name, Photo FROM Sponsor WHERE SponsorID = '$sponsorID'";
        $result = $this->conf->db_query($query);
        if (mysql_num_rows($result) > 0) {
            while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
                //post id, userid, photo, post content, date time, status
                $resultArray[] = array($row[0], $row[1], $row[2]);
            }
            $this->conf->db_close();
            return $resultArray;
        }
    }
    
    function getusercoin_db($sponsorID){
        $this->conf = new Config();
        $this->conf->db_connect();

        $query = "SELECT Coins FROM Sponsor WHERE SponsorID = '$sponsorID'";
        $result = $this->conf->db_query($query);
        if (mysql_num_rows($result) > 0) {
            $temp = mysql_fetch_array($result);
            return $temp[0];
        }
        
            $this->conf->db_close();
            return null;
    }
    
}

?>
