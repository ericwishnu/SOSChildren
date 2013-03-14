<?php

session_start();
include 'FoundationDAO.php';

$test = new FoundationCtrl();
$test->run();

class FoundationCtrl {

    private $foundation_db_class;

    public function FoundationCtrl() {
        $this->foundation_db_class = new FoundationDAO();
    }

    public function run() {
        $page = $_POST['action'];

        if ($page == "searchfoundation") {
            $this->searchfoundation();
        } elseif ($page == "listfoundation") {
            $this->listfoundation();
        } elseif ($page == "foundationprofile") {
            $this->foundationprofile();
        } 
    }

    private function searchfoundation() {
        $searchby = $_POST['searchby'];
        $keyword = $_POST['keyword'];

        if (!$keyword == "") {
            $_SESSION['searchfoundationresult'] = "1";
            $_SESSION['searchfoundationdataobj'] = serialize($this->foundation_db_class->searchfoundation_db($searchby, $keyword));
            header("location: FoundationSearchResult.php");
        } else {
            $_SESSION['searchfoundationresult'] = "0";
            $_SESSION['searchfoundationdataobj'] = serialize($this->foundation_db_class->searchfoundation_db($searchby, $keyword));
            header("location: FoundationSearchResult.php");
        }
    }

    private function listfoundation() {
        $_SESSION['foundationlistdataobj'] = serialize($this->foundation_db_class->listfoundation_db());
        header("location: FoundationList.php");
    }

    private function foundationprofile() {


        $foundationID = $_POST['foundationSelectedID'];
        $_SESSION['foundationpost'] = serialize($this->foundation_db_class->listPost_db($foundationID));
        $_SESSION['foundationdataobj'] = serialize($this->foundation_db_class->foundationprofile_db($foundationID));
        header("location: FoundationProfile.php");
    }

 
}

?>
