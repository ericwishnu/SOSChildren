<?php

session_start();
include 'PeopleDAO.php';

$test = new PeopleCtrl();
$test->run();

class PeopleCtrl {

    private $people_db_class;

    public function PeopleCtrl() {
        $this->people_db_class = new PeopleDAO();
    }

    public function run() {
        $page = $_POST['action'];

        if ($page == "searchpeople") {
            $this->searchpoeple();
        } elseif ($page == "seepeopleprofile") {
            $this->seepeopleprofile();
        } elseif ($page == "listneighbours") {
            $this->listneighbours();
        } elseif ($page == "addneighbour") {
            $this->addneighbour();
        } elseif ($page == "neighbourrequest") {
            $this->neighbourrequest();
        } elseif ($page == "approveneighbour") {
            $this->approveneighbour();
        } elseif ($page == "editrelationship") {
            $this->editrelationship();
        } elseif ($page == "removeneighbour") {
            $this->removeneighbour();
        } elseif ($page == "sendmessage") {
            $this->sendmessage();
        } elseif ($page == "listmessage") {
            $this->listmessage();
        } elseif ($page == "viewmessagecontent") {
            $this->viewmessagecontent();
        } elseif ($page == "deletemessage") {
            $this->deletemessage();
        } elseif ($page == "addpost") {
            $this->addpost();
        } elseif ($page == "deletepost") {
            $this->deletepost();
        } elseif ($page == "viewnewsfeed") {
            $this->viewnewsfeed();
        } elseif ($page == "viewnewsfeedfromneighbour") {
            $this->viewnewsfeedfromneighbour();
        } elseif ($page == "viewnewsfeedfromfoundation") {
            $this->viewnewsfeedfromfoundation();
        } elseif ($page == "globalsearchpeople") {
            $this->globalsearchpeople();
        } elseif ($page == "preparesearch") {
            $this->preparesearch();
        }
    }

    private function searchpoeple() {
        $searchby = $_POST['searchby'];
        $keyword = $_POST['keyword'];

        if (!$keyword == "") {
            $_SESSION['searchpeopleresult'] = "1";
            $_SESSION['searchpeopledataobj'] = serialize($this->people_db_class->searchpeople_db($searchby, $keyword));
            header("location: PeopleSearchResult.php");
        } else {
            $_SESSION['searchpeopleresult'] = "0";
            $_SESSION['searchpeopledataobj'] = serialize($this->people_db_class->searchpeople_db($searchby, $keyword));
            header("location: PeopleSearchResult.php");
        }
    }

    private function seepeopleprofile() {
        $username = $_SESSION['usernameU'];
        $peopleID = $_POST['peopleSelectedID'];
        $userType = 'Sponsor';
        
        $_SESSION['peopledataobj'] = serialize($this->people_db_class->peopleprofile_db($peopleID));
        $_SESSION['relationship'] = $this->people_db_class->seeneighbourship_db($username, $peopleID);
        $_SESSION['postlistdataobj'] = serialize($this->people_db_class->viewpersonalpost_db($peopleID, $userType));

        header("location: PeopleProfile.php");
    }

    private function listneighbours() {
        $username = $_SESSION['usernameU'];
        $_SESSION['peoplelistdataobj'] = serialize($this->people_db_class->listneighbours_db($username));
        header("location: PeopleList.php");
    }

    private function addneighbour() {
        $username = $_SESSION['usernameU'];
        $peopleID = $_POST['peopleID'];

        $this->people_db_class = new PeopleDAO();
        $result = $this->people_db_class->addneighbour_db($username, $peopleID);

        if (!$result) {
            $_SESSION['message'] = "Error Send Neighbour Request";
            $_SESSION['peopledataobj'] = serialize($this->people_db_class->peopleprofile_db($peopleID));
            $_SESSION['relationship'] = $this->people_db_class->seeneighbourship_db($username, $peopleID);
            header('location: PeopleProfile.php');
        } else {
            $_SESSION['message'] = "Neighbour Request Sent!";
            $_SESSION['peopledataobj'] = serialize($this->people_db_class->peopleprofile_db($peopleID));
            $_SESSION['relationship'] = $this->people_db_class->seeneighbourship_db($username, $peopleID);
            header('location: PeopleProfile.php');
        }
    }

    private function neighbourrequest() {
        $username = $_SESSION['usernameU'];
        $_SESSION['peoplelistdataobj'] = serialize($this->people_db_class->neighbourrequest_db($username));
        header("location: UserNotification.php");
    }

    private function approveneighbour() {
        $username = $_SESSION['usernameU'];
        $peopleID = $_POST['peopleID'];
        $relationship = "Neighbour";

        $this->people_db_class = new PeopleDAO();
        $result = $this->people_db_class->editrelationship_db($username, $peopleID, $relationship);

        if (!$result) {
            $_SESSION['message'] = "Neighbour Approval Failed";
            $_SESSION['peopledataobj'] = serialize($this->people_db_class->peopleprofile_db($peopleID));
            $_SESSION['relationship'] = $this->people_db_class->seeneighbourship_db($username, $peopleID);
            $_SESSION['postlistdataobj'] = serialize($this->people_db_class->viewpersonalpost_db($peopleID, $userType));
            header('location: PeopleProfile.php');
        } else {
            $_SESSION['message'] = "Neighbour Approval Success!";
            $_SESSION['peopledataobj'] = serialize($this->people_db_class->peopleprofile_db($peopleID));
            $_SESSION['relationship'] = $this->people_db_class->seeneighbourship_db($username, $peopleID);
            $_SESSION['postlistdataobj'] = serialize($this->people_db_class->viewpersonalpost_db($peopleID, $userType));
            header('location: PeopleProfile.php');
        }
    }

    private function editrelationship() {
        $username = $_SESSION['usernameU'];
        $peopleID = $_POST['peopleID'];
        $relationship = $_POST['relationship'];

        $this->people_db_class = new PeopleDAO();
        $result = $this->people_db_class->editrelationship_db($username, $peopleID, $relationship);

        if ($result == true) {
            $_SESSION['message'] = "Success Update Relationship Status!";
            $_SESSION['peopledataobj'] = serialize($this->people_db_class->peopleprofile_db($peopleID));
            $_SESSION['relationship'] = $this->people_db_class->seeneighbourship_db($username, $peopleID);
            header('location: PeopleProfile.php');
        } else {
            $_SESSION['message'] = "Failed Update Relationship Status";
            $_SESSION['peopledataobj'] = serialize($this->people_db_class->peopleprofile_db($peopleID));
            $_SESSION['relationship'] = $this->people_db_class->seeneighbourship_db($username, $peopleID);
            header('location: PeopleProfile.php');
        }
    }

    private function removeneighbour() {
        $username = $_SESSION['usernameU'];
        $peopleID = $_POST['peopleID'];

        $this->people_db_class = new PeopleDAO();
        $result = $this->people_db_class->removeneighbour_db($username, $peopleID);

        if ($result == true) {
            $_SESSION['message'] = "Neighbour Removed!";
            $_SESSION['peopledataobj'] = serialize($this->people_db_class->peopleprofile_db($peopleID));
            $_SESSION['relationship'] = $this->people_db_class->seeneighbourship_db($username, $peopleID);
            header('location: PeopleProfile.php');
        } else {
            $_SESSION['message'] = "Failed Remove Neighbour";
            $_SESSION['peopledataobj'] = serialize($this->people_db_class->peopleprofile_db($peopleID));
            $_SESSION['relationship'] = $this->people_db_class->seeneighbourship_db($username, $peopleID);
            header('location: PeopleProfile.php');
        }
    }

    private function sendmessage() {
        
    }

    private function listmessage() {
        
    }

    private function viewmessagecontent() {
        
    }

    private function deletemessage() {
        
    }

    private function addpost() {
        $sponsorID = $_POST['id'];
        $postcontent = $_POST['$content'];

        $this->people_db_class = new PeopleDAO();
        $result = $this->people_db_class->addpost_db($sponsorID, $postcontent);

        if (!$result) {
            $_SESSION['message'] = "Error Post Status";
            $_SESSION['postlistdataobj'] = serialize($this->people_db_class->viewnewsfeedfromneighbour_db($username));
        } else {
            $_SESSION['message'] = "Success Post Status!";
            $_SESSION['postlistdataobj'] = serialize($this->people_db_class->viewnewsfeedfromneighbour_db($username));
        }
    }

    private function deletepost() {
        $sponsorID = $_POST['userid'];
        $postID = $_POST['postid'];

        $this->people_db_class = new PeopleDAO();
        $result = $this->people_db_class->deletepost_db($sponsorID, $postID);

        if (!$result) {
            $_SESSION['message'] = "Error Post Status";
            $_SESSION['postlistdataobj'] = serialize($this->people_db_class->viewnewsfeedfromneighbour_db($username));
        } else {
            $_SESSION['message'] = "Success Post Status!";
            $_SESSION['postlistdataobj'] = serialize($this->people_db_class->viewnewsfeedfromneighbour_db($username));
        }
    }

    private function viewnewsfeed() {

        $username = $_SESSION['usernameU'];

        //$_SESSION['newsfeeddataobj'] = serialize($this->people_db_class->viewnewsfeed_db($username));
        $_SESSION['neighbournewsfeeddataobj'] = serialize($this->people_db_class->viewnewsfeedfromneighbour_db($username));
        $_SESSION['foundationnewsfeeddataobj'] = serialize($this->people_db_class->viewnewsfeedfromfoundation_db($username));
        $_SESSION['newsfeedtype'] = '0';
        header("location: MainPage.php");
    }

    private function viewnewsfeedfromneighbour() {
        $username = $_SESSION['usernameU'];

        $_SESSION['newsfeeddataobj'] = serialize($this->people_db_class->viewnewsfeedfromneighbour_db($username));
        $_SESSION['newsfeedtype'] = '1';

        header("location: MainPage.php");
    }

    private function viewnewsfeedfromfoundation() {
        $username = $_SESSION['usernameU'];

        $_SESSION['newsfeeddataobj'] = serialize($this->people_db_class->viewnewsfeedfromfoundation_db($username));
        $_SESSION['newsfeedtype'] = '2';

        header("location: MainPage.php");
    }

    private function globalsearchpeople() {
        $keyword = $_POST['keyword'];
       
            
        if ($keyword != "") {
            $_SESSION['globalsearchresult'] = "1";
            $_SESSION['searchpeopledataobj'] = serialize($this->people_db_class->globalsearchpeople_db($keyword));
            $_SESSION['searchfoundationdataobj'] = serialize($this->people_db_class->globalsearchfoundation_db($keyword));
            header("location: GlobalSearchResult.php?key=$keyword");
        } else {
            $_SESSION['searchpeopleresult'] = "0";
            header("location: GlobalSearchResult.php?key=$keyword");
        }
    }

    private function preparesearch(){
        header("location: PeopleSearch.php");
    }
}

?>
