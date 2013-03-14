<?php
//ADMIN
include '../Database/Config.php';
include 'User.php';

class UserDAO {

    function listUser_db() {
        $resultArray;
        $this->conf = new Config();
        $this->conf->db_connect();

        $query = "SELECT * FROM sponsor";
        $result = $this->conf->db_query($query);

        if (mysql_num_rows($result) > 0) {
            while ($row = mysql_fetch_array($result, MYSQL_NUM)) {

                $resultArray[] = new User($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10], $row[11]);
            }
            $this->conf->db_close();
            return $resultArray;
        }
    }

    function addUser_db($sponsorID, $password, $email, $name, $address, $city, $state, $country, $postalCode, $phone, $photo, $coins) {
        $this->conf = new Config();
        $this->conf->db_connect();

        //check unique
        $query = "SELECT * FROM sponsor WHERE SponsorID = '$sponsorID'";
        $result = $this->conf->db_query($query);
        if (!$result) {
            throw new Exception('Could not execute query<br>');
        }
        if (mysql_num_rows($result) > 0) {
            //throw new Exception('That SponsorID is taken - go back and choose another one.\n');
        }




        //insert
        $query = "INSERT INTO sponsor (SponsorID, Password, Email, Name,Address, City, State, Country, PostalCode, Phone, Photo, Coins) 
            VALUES ('$sponsorID', md5('$password'),'$email', '$name',  '$address', '$city', '$state', '$country', '$postalCode',  '$phone','$photo',  $coins)";
        $result = $this->conf->db_query($query);
        if (!$result) {
            //throw new Exception('Could not register it in database - please try again later.\n');
        }
        
        return true;
    }

    function deleteuser_db($sponsorID) {
        $this->conf = new Config();
        $this->conf->db_connect();
        $query = "DELETE FROM sponsor WHERE SponsorID='$sponsorID'";
        $result = $this->conf->db_query($query);
        if (!$result) {
            throw new Exception('Update failed - please try again later.\n');
        }
        return true;
    }

    function accountinfo_db($sponsorID) {
        $this->conf = new Config();
        $this->conf->db_connect();

        $query = "SELECT * FROM sponsor WHERE SponsorID = '$sponsorID'";
        $result = $this->conf->db_query($query);

        if (mysql_num_rows($result) > 0) {
            $temp = mysql_fetch_array($result);
            return new User($temp[0], $temp[1], $temp[2], $temp[3], $temp[4], $temp[5], $temp[6], $temp[7], $temp[8], $temp[9], $temp[10], $temp[11]);
        }

        return null;
    }

    function editprofile_db($username, $name, $address, $city, $state, $country, $postalCode, $email, $phone, $coins) {
        $this->conf = new Config();
        $this->conf->db_connect();

        $query = "UPDATE sponsor SET 
                    Name = '$name',
                    Address = '$address',
                    City = '$city',
                    State = '$state',
                    Country = '$country',
                    Postalcode = '$postalCode',    
                    Email = '$email', 
                    Phone = '$phone', 
                    Coins = $coins
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

        $query = "UPDATE sponsor SET 
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

        $query = "UPDATE sponsor SET 
                    Photo = '$photo'
                 WHERE SponsorID = '$username'";
        $result = $this->conf->db_query($query);
        if (!$result) {
            throw new Exception('Update failed - please try again later.\n');
        }
        return true;
    }

}

?>
