<?php

include '../Database/Config.php';
include 'Kids.php';

class KidsDAO {

    private $conf;

    function searchkids_db($searchby, $keyword) {

        $resultArray;
        $this->conf = new Config();
        $this->conf->db_connect();

        $query = "SELECT * FROM Kids WHERE $searchby LIKE '%$keyword%'";
        $result = $this->conf->db_query($query);

        if (mysql_num_rows($result) > 0) {
            while ($row = mysql_fetch_array($result, MYSQL_NUM)) {

                $resultArray[] = new Kids($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10], $temp1[1], $temp1[2]);
            }
            $this->conf->db_close();
            return $resultArray;
        }
    }

    function listkids_db() {
        $resultArray;
        $this->conf = new Config();
        $this->conf->db_connect();

        $query = "SELECT * FROM Kids";
        $result = $this->conf->db_query($query);

        if (mysql_num_rows($result) == 0) {
            return false;
        }

        while ($row = mysql_fetch_array($result, MYSQL_NUM)) {

            $query1 = "SELECT * FROM KidsList WHERE KidsID = $row[0]";
            $result1 = $this->conf->db_query($query1);

            if (mysql_num_rows($result1) > 0) {
                $temp1 = mysql_fetch_array($result1);

                $resultArray[] = new Kids($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10], $temp1[1], $temp1[2]);
            }
        }

        return $resultArray;
    }

    function listkidsbyfoundation_db($foundationID) {
        $resultArray;
        $this->conf = new Config();
        $this->conf->db_connect();

        $query = "SELECT * FROM Kids";
        $result = $this->conf->db_query($query);

        if (mysql_num_rows($result) == 0) {
            return false;
        }

        while ($row = mysql_fetch_array($result, MYSQL_NUM)) {

            $query1 = "SELECT * FROM KidsList WHERE KidsID = $row[0] AND FoundationID = '$foundationID'";
            $result1 = $this->conf->db_query($query1);

            if (mysql_num_rows($result1) > 0) {
                $temp1 = mysql_fetch_array($result1);

                $resultArray[] = new Kids($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10], $temp1[1], $temp1[2]);
            }
        }

        return $resultArray;
    }

    function listmykids_db($sponsorID) {
        $resultArray;
        $this->conf = new Config();
        $this->conf->db_connect();

        $query2 = "SELECT * FROM Donorship WHERE SponsorID = '$sponsorID'";
        $result2 = $this->conf->db_query($query2);

        if (mysql_num_rows($result2) > 0) {
            while ($row2 = mysql_fetch_array($result2, MYSQL_NUM)) {
                $query = "SELECT * FROM Kids WHERE KidsID = $row2[3]";
                $result = $this->conf->db_query($query);

                if (mysql_num_rows($result) == 0) {
                    return false;
                }

                while ($row = mysql_fetch_array($result, MYSQL_NUM)) {

                    $query1 = "SELECT * FROM KidsList where KidsID = $row[0]";
                    $result1 = $this->conf->db_query($query1);

                    if (mysql_num_rows($result1) > 0) {
                        $temp1 = mysql_fetch_array($result1);

                        $resultArray[] = new Kids($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10], $temp1[1], $temp1[2]);
                    }
                }
            }

            return $resultArray;
        }
    }

    function kidsprofile_db($kidsID) {
        $this->conf = new Config();
        $this->conf->db_connect();

        $query = "SELECT * FROM Kids WHERE KidsID = $kidsID";
        $result = $this->conf->db_query($query);

        if (mysql_num_rows($result) > 0) {
            $temp = mysql_fetch_array($result);

            $query1 = "SELECT * FROM KidsList WHERE KidsID = $kidsID";
            $result1 = $this->conf->db_query($query1);

            if (mysql_num_rows($result1) > 0) {
                $temp1 = mysql_fetch_array($result1);

                return new Kids($temp[0], $temp[1], $temp[2], $temp[3], $temp[4], $temp[5], $temp[6], $temp[7], $temp[8], $temp[9], $temp[10], $temp1[1], $temp1[2]);
            }
        }
        return null;
    }

    function kidsprofilefoundation_db($kidsID) {
        $this->conf = new Config();
        $this->conf->db_connect();

        $query = "SELECT * FROM Kids WHERE KidsID = $kidsID";
        $result = $this->conf->db_query($query);

        if (mysql_num_rows($result) > 0) {
            $temp = mysql_fetch_array($result);


            $query1 = "SELECT * FROM KidsList WHERE KidsID = $kidsID";
            $result1 = $this->conf->db_query($query1);


            if (mysql_num_rows($result1) > 0) {
                $temp1 = mysql_fetch_array($result1);

                return array($temp[0], $temp[1], $temp[2], $temp[3], $temp[4], $temp[5], $temp[6], $temp[7], $temp[8], $temp[9], $temp[10], $temp1[1], $temp1[2]);
            }
        }
        return null;
    }

    function fosterKid_db($sponsorID, $foundationID, $kidsID) {
        $this->conf = new Config();
        $this->conf->db_connect();

        $currentdatetime = date('Y-m-d') . " " . date("H:i:s");
        $query = "INSERT INTO Donorship (SponsorID, FoundationID, KidsID, DateTime) 
            VALUES ('$sponsorID', '$foundationID', $kidsID, '$currentdatetime')";
        $result = $this->conf->db_query($query);

        if (!$result) {
            //throw new Exception('Could not register it in database - please try again later.\n');
        }

        return true;
    }

    function checkFoster_db($sponsorID, $kidsID) {
        $this->conf = new Config();
        $this->conf->db_connect();

        $query = "SELECT * FROM Donorship WHERE SponsorID = '$sponsorID' AND KidsID = $kidsID";
        $result = $this->conf->db_query($query);

        if (mysql_num_rows($result) > 0) {
            return true;
        }
        return false;
    }

        function foundationgetname_db(){
                $resultArray;
        $this->conf = new Config();
        $this->conf->db_connect();

        $query = "SELECT FoundationID, Name FROM Foundation";
        $result = $this->conf->db_query($query);

        if (mysql_num_rows($result) > 0) {

            while ($row = mysql_fetch_array($result, MYSQL_NUM)) {

                $resultArray[] = array($row[0], $row[1]);
            }

            $this->conf->db_close();

            return $resultArray;
        }
    }
}

?>
