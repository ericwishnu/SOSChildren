<?php

include '../Database/Config.php';
include 'Foundation.php';

class FoundationDAO {

    private $conf;

    function searchfoundation_db($searchby, $keyword) {

        $resultArray;
        $this->conf = new Config();
        $this->conf->db_connect();

        $query = "SELECT * FROM Foundation WHERE $searchby LIKE '%$keyword%'";
        $result = $this->conf->db_query($query);

        if (mysql_num_rows($result) > 0) {
            while ($row = mysql_fetch_array($result, MYSQL_NUM)) {

                $resultArray[] = new Foundation($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10], $row[11]);
            }
            $this->conf->db_close();
            return $resultArray;
        }
    }

    function listfoundation_db() {
        $resultArray;
        $this->conf = new Config();
        $this->conf->db_connect();

        $query = "SELECT * FROM Foundation";
        $result = $this->conf->db_query($query);

        if (mysql_num_rows($result) > 0) {

            while ($row = mysql_fetch_array($result, MYSQL_NUM)) {

                $resultArray[] = new Foundation($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10], $row[11]);
            }

            $this->conf->db_close();

            return $resultArray;
        }
    }

    function foundationprofile_db($foundationID) {
        $this->conf = new Config();
        $this->conf->db_connect();

        $query = "SELECT * FROM Foundation WHERE FoundationID = '$foundationID'";
        $result = $this->conf->db_query($query);

        if (mysql_num_rows($result) > 0) {

            $temp = mysql_fetch_array($result);

            return new Foundation($temp[0], $temp[1], $temp[2], $temp[3], $temp[4], $temp[5], $temp[6], $temp[7], $temp[8], $temp[9], $temp[10], $temp[11]);
        }

        return null;
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

}

?>
