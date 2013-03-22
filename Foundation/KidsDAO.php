<?php

include '../Database/Config.php';
include 'Kids.php';

class KidsDAO {

    function addKid_db($foundationID, $kidsID, $name, $photo, $DOB, $background, $region, $origin, $aspiration, $health, $education, $nutrition) {
        $this->conf = new Config();
        $this->conf->db_connect();

        $query = "INSERT INTO kids (Name, Photo, DOB, Background, Region, Origin, Aspiration, Health, Education, Nutrition, NeededCoin) 
            VALUES ('$name', '$photo', '$DOB', '$background', '$region', '$origin', '$aspiration', $health, $education, $nutrition, 50)";
        $result = $this->conf->db_query($query);

        if (!$result) {
            throw new Exception('Could not register it in database - please try again later.\n');
        } else {
            $query1 = "INSERT INTO kidsList (FoundationID, KidsIDinFoundation) 
                VALUES ('$foundationID', '$kidsID')";
            $result1 = $this->conf->db_query($query1);

            if (!$result1) {
                throw new Exception('Could not register it in database - please try again later.\n');
            }
        }
        return true;
    }

    function listkids_db($foundationID) {
        $resultArray;
        $this->conf = new Config();
        $this->conf->db_connect();

        $query = "SELECT k.KidsID, k.Name, k.Photo, k.DOB, k.Background, k.Region, k.Origin, k.Aspiration, k.Health, k.Education, k.Nutrition,
                    l.FoundationID, l.KidsIDinFoundation 
                    FROM kids k,kidslist l 
                    WHERE k.KidsID = l.KidsID AND l.FoundationID = '$foundationID'";
        $result = $this->conf->db_query($query);

        if (mysql_num_rows($result) > 0) {
            while ($row = mysql_fetch_array($result, MYSQL_NUM)) {

                $resultArray[] = new Kids($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10], $row[11], $row[12]);
            }
            $this->conf->db_close();
            return $resultArray;
        }
    }

    function kidsinfo_db($kidsID) {
        $this->conf = new Config();
        $this->conf->db_connect();

        //$query = "SELECT * FROM kids WHERE kidsID = '$kidsID'";
        $query = "SELECT k.KidsID, k.Name, k.Photo, k.DOB, k.Background, k.Region, k.Origin, k.Aspiration, k.Health, k.Education, k.Nutrition,
                    l.FoundationID, l.KidsIDinFoundation 
                    FROM kids k,kidslist l 
                    WHERE k.KidsID = l.KidsID AND k.KidsID = '$kidsID'";
        $result = $this->conf->db_query($query);

        if (mysql_num_rows($result) > 0) {
            $temp = mysql_fetch_array($result);
            return new Kids($temp[0], $temp[1], $temp[2], $temp[3], $temp[4], $temp[5], $temp[6], $temp[7], $temp[8], $temp[9], $temp[10], $temp[11], $temp[12]);
        }

        return null;
    }

    function editKid_db($foundationID, $kidsID, $name, $DOB, $background, $region, $origin, $aspiration, $health, $education, $nutrition) {
        $this->conf = new Config();
        $this->conf->db_connect();

        $query1 = "SELECT * FROM kidsList WHERE KidsID = '$kidsID' AND FoundationID = '$foundationID'";
        $result1 = $this->conf->db_query($query1);

        if (mysql_num_rows($result1) > 0) {

            $query = "UPDATE kids SET 
                        Name = '$name', 
                        DOB = '$DOB', 
                        Background = '$background',
                        Region = '$region',
                        Origin = '$origin', 
                        Aspiration = '$aspiration',
                        Health = $health,
                        Education = $education,
                        Nutrition = $nutrition 
                    WHERE KidsID = '$kidsID'";
            $result = $this->conf->db_query($query);




            if (!$result) {
                throw new Exception('Update failed - please try again later.\n');
            }

            return true;
        }
    }

    function editkidlistfoundation_db($kidsID, $foundationID) {
        $this->conf = new Config();
        $this->conf->db_connect();
        $query = "UPDATE kidslist SET Foundationid = '$foundationID' WHERE KidsID='$kidsID'";
        $result = $this->conf->db_query($query);
        if (!$result) {
            throw new Exception('Update failed - please try again later.\n');
        }
        return false;
    }

    function changepicture_db($username, $photo) {
        $this->conf = new Config();
        $this->conf->db_connect();

        $query = "UPDATE kids SET 
                    Photo = '$photo'
                    
                 WHERE KidsID = '$username'";
        $result = $this->conf->db_query($query);
        if (!$result) {
            throw new Exception('Update failed - please try again later.\n');
        }
        return true;
    }

    function deleteKid_db($kidsID) {
        $this->conf = new Config();
        $this->conf->db_connect();
        $query = "DELETE FROM kids WHERE KidsID='$kidsID'";
        $result = $this->conf->db_query($query);
        if (!$result) {
            throw new Exception('Update failed - please try again later.\n');
        }
        return true;
    }

}

?>
