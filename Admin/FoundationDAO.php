<?php

include '../Database/Config.php';

class FoundationDAO {

    //put your code here

    function listFoundation_db() {
        $resultArray;
        $this->conf = new Config();
        $this->conf->db_connect();

        $query = "SELECT * FROM foundation";
        $result = $this->conf->db_query($query);

        if (mysql_num_rows($result) > 0) {
            while ($row = mysql_fetch_array($result, MYSQL_NUM)) {

                $resultArray[] = new Foundation($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10], $row[11]);
            }
            $this->conf->db_close();
            return $resultArray;
        }
    }

    function addFoundation_db($foundationID, $password, $name, $photo, $address, $city, $state, $country, $postalCode, $accountNo, $phone, $description) {
        $this->conf = new Config();
        $this->conf->db_connect();

        //check unique
        $query = "SELECT * FROM foundation WHERE FoundationID = '$foundationID'";
        $result = $this->conf->db_query($query);
        if (!$result) {
            throw new Exception('Could not execute query<br>');
        }
        if (mysql_num_rows($result) > 0) {
            throw new Exception('That FoundationID is taken - go back and choose another one.\n');
        }

        //insert
        $query = "INSERT INTO foundation (FoundationID, Password, Name, Photo, Address, City, State, Country, PostalCode, AccountNo, Phone, Description) 
            VALUES ('$foundationID', md5('$password'), '$name', '$photo', '$address', '$city', '$state', '$country', '$postalCode', '$accountNo', '$phone',  '$description')";
        $result = $this->conf->db_query($query);
        if (!$result) {
            throw new Exception('Could not register it in database - please try again later.\n');
        }
        return true;
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

    function editprofile_db($username, $name, $address, $city, $state, $country, $postalCode, $accountNo, $phone, $description) {
        $this->conf = new Config();
        $this->conf->db_connect();

        $query = "UPDATE foundation SET 
                    Name = '$name',
                    Address = '$address',
                    City = '$city',
                    State = '$state',
                    Country = '$country',
                    postalcode = '$postalCode',    
                    Accountno = '$accountNo', 
                    Phone = '$phone', 
                    Description = '$description'
                 WHERE FoundationID = '$username'";
        $result = $this->conf->db_query($query);
        if (!$result) {
            throw new Exception('Update failed - please try again later.\n');
        }
        return true;
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
                    photo = '$photo'
                    
                 WHERE FoundationID = '$username'";
        $result = $this->conf->db_query($query);
        if (!$result) {
            throw new Exception('Update failed - please try again later.\n');
        }
        return true;
    }

    function deletefoundation_db($foundationID) {
        $this->conf = new Config();
        $this->conf->db_connect();
        $query = "DELETE FROM foundation WHERE FoundationID='$foundationID'";
        $result = $this->conf->db_query($query);
        if (!$result) {
            throw new Exception('Update failed - please try again later.\n');
        }
        return true;
    }

}

?>
