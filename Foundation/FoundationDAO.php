<?php

include '../Database/Config.php';

class FoundationDAO {

    private $conf;

    //Login Function
    function login_db($username, $password) {
        $this->conf = new Config();
        $this->conf->db_connect(); //Connect Database
        //DatabaseQuery
        $query = "SELECT * FROM foundation WHERE FoundationID = '$username' AND Password = md5('$password')";
        $result = $this->conf->db_query($query);

        $this->conf->db_close();
        if (mysql_num_rows($result) > 0) {
            return true;
        }
        return false;
    }

    function accountinfo_db($foundationID) {
        $this->conf = new Config();
        $this->conf->db_connect();

        $query = "SELECT * FROM foundation WHERE FoundationID = '$foundationID'";
        $result = $this->conf->db_query($query);

        if (mysql_num_rows($result) > 0) {
            $temp = mysql_fetch_array($result);
            return new Foundation($temp[0], $temp[1], $temp[2], $temp[3], $temp[4], $temp[5], $temp[6], $temp[7], $temp[8], $temp[9], $temp[10], $temp[11]);
        }

        return null;
    }

    function changepassword_db($username, $password) {
        $this->conf = new Config();
        $this->conf->db_connect();

        $query = "UPDATE foundation SET 
                    Password = md5('$password')
                    
                 WHERE FoundationID = '$username'";
        $result = $this->conf->db_query($query);
        if (!$result) {
            throw new Exception('Update failed - please try again later.\n');
        }
        return true;
    }

    function changelogo_db($username, $photo) {
        $this->conf = new Config();
        $this->conf->db_connect();

        $query = "UPDATE foundation SET 
                    Photo = '$photo'
                    
                 WHERE FoundationID = '$username'";
        $result = $this->conf->db_query($query);
        if (!$result) {
            throw new Exception('Update failed - please try again later.\n');
        }
        return true;
    }

    function addPost_db($foundationID, $title, $content, $photo) {
        $this->conf = new Config();
        $this->conf->db_connect();

        $query = "INSERT INTO foundationpost (Title, Photo, DateTime, Content, FoundationID) 
            VALUES ('$title', '$photo', NOW(), '$content', '$foundationID')";
        $result = $this->conf->db_query($query);

        if (!$result) {
            throw new Exception('Could not register it in database - please try again later.\n');
            return false;
        }
        return true;
    }

    function listPost_db($foundationID) {
        $resultArray;
        $this->conf = new Config();
        $this->conf->db_connect();

        $query = "SELECT * FROM foundationpost WHERE FoundationID = '$foundationID'";
        $result = $this->conf->db_query($query);

        if (mysql_num_rows($result) > 0) {
            while ($row = mysql_fetch_array($result, MYSQL_NUM)) {

                $resultArray[] = array($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6]);
            }
            $this->conf->db_close();
            return $resultArray;
        }
    }

    function deletePost_db($postid) {
        $this->conf = new Config();
        $this->conf->db_connect();
        $query = "DELETE FROM foundationpost WHERE FoundationPostID='$postid'";
        $result = $this->conf->db_query($query);
        if (!$result) {
            throw new Exception('Update failed - please try again later.\n');
        }
        return true;
    }

}

?>
