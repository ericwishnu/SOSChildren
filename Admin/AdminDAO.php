<?php

include '../Database/Config.php';
include '../Foundation/Foundation.php';
include 'Admin.php';

class AdminDAO {

    private $conf;

    function login_db($username, $password) {
        $this->conf = new Config();
        $this->conf->db_connect();

        $query = "SELECT * FROM admin WHERE AdminID = '$username' AND Password = md5('$password')";
        $result = $this->conf->db_query($query);
        $this->conf->db_close();

        if (mysql_num_rows($result) > 0) {
            return true;
        }
        return false;
    }

    function listAdmin_db() {
        $resultArray;
        $this->conf = new Config();
        $this->conf->db_connect();

        $query = "SELECT * FROM admin";
        $result = $this->conf->db_query($query);

        if (mysql_num_rows($result) > 0) {
            while ($row = mysql_fetch_array($result, MYSQL_NUM)) {

                $resultArray[] = new Admin($row[0], $row[1], $row[2]);
            }
            return $resultArray;
        }
    }

    function deleteAdmin_db ($adminID)
    {
        $this->conf = new Config();
        $this->conf->db_connect();
        
        $query = "DELETE FROM admin WHERE AdminID = '$adminID'";
        $result = $this->conf->db_query($query);
        if (!$result) {
            throw new Exception('Delete failed - please try again later.\n');
        }
        $this->conf->db_close();
        return true;
    }

    function addAdmin_db($adminID,$password,$position) {
        $this->conf = new Config();
        $this->conf->db_connect();

        //check unique
        $query = "SELECT * FROM admin WHERE AdminID = '$adminID'";
        $result = $this->conf->db_query($query);
        if (!$result) {
            throw new Exception('Could not execute query<br>');
        }
        if (mysql_num_rows($result) > 0) {
            throw new Exception('That AdminID is taken - go back and choose another one.\n');
        }




        //insert
        $query = "INSERT INTO admin (AdminID, Password, Position) 
            VALUES ('$adminID', md5('$password'),  '$position')";
        $result = $this->conf->db_query($query);
        if (!$result) {
            throw new Exception('Could not register it in database - please try again later.\n');
        }
        return true;
    }

    function accountinfo_db($adminID) {
        $this->conf = new Config();
        $this->conf->db_connect();

        $query = "SELECT * FROM admin WHERE adminID = '$adminID'";
        $result = $this->conf->db_query($query);

        if (mysql_num_rows($result) > 0) {
            $temp = mysql_fetch_array($result);
            return new Admin($temp[0], $temp[1], $temp[2]);
        }

        return null;
    }

    function changesettings_db($username, $password, $position) {
        $this->conf = new Config();
        $this->conf->db_connect();

        $query = "UPDATE admin SET 
                    Password = md5('$password'),
                    Position = '$position'
                 WHERE AdminID = '$username'";
        $result = $this->conf->db_query($query);
        if (!$result) {
            throw new Exception('Update failed - please try again later.\n');
        }
        return true;
    }

}

?>
