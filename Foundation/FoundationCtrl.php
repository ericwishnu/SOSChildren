<?php

session_start();
include 'FoundationDAO.php';
include 'Foundation.php';
include 'Kids.php';
$test = new FoundationCtrl();
$test->run();

class FoundationCtrl {

    private $foundation_db_class;

    public function FoundationCtrl() {
        $this->foundation_db_class = new FoundationDAO();
    }

    public function run() {

        $page = $_POST['action'];

        if ($page == "login") {
            $this->login();
        } elseif ($page == "prepareSettings") {
            $this->prepareSettings();
        } elseif ($page == "logout") {
            $this->logout();
        } elseif ($page == "preparechangepassword") {
            $this->prepareChangePassword();
        } elseif ($page == "changepassword") {
            $this->changePassword();
        } elseif ($page == "preparechangelogo") {
            $this->prepareChangeLogo();
        } elseif ($page == "changelogo") {//buatlogo
            $this->changeLogo();
        } elseif ($page == "post") {
            $this->post();
        } elseif( $page=="profile"){
            $this->profile();
        } elseif( $page=="deletepost"){
            $this->deletePost();
        }
    }

    private function login() {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $this->foundation_db_class = new FoundationDAO();
        $dbCheck = $this->foundation_db_class->login_db($username, $password);

        if ($dbCheck == TRUE) {
            $_SESSION['usernameF'] = $_POST['username'];
            header('location: FoundationMainPage.php');
        } else {
            $_SESSION['message'] = "login failed";

            header('location: FoundationLogin.php');
        }
    }

    private function logout() {
        session_destroy();
        header("location: FoundationLogin.php");
    }

    private function prepareSettings() {
        $_SESSION['foundationdataobj'] = serialize($this->getFoundationData($_SESSION['usernameF']));
        header("location: FoundationSettings.php");
    }

    private function getFoundationData($foundationID) {
        return $this->foundation_db_class->accountinfo_db($foundationID);
    }

    private function prepareChangePassword() {
        $username = $_POST['id'];
        $_SESSION['foundationdataobj'] = serialize($this->foundation_db_class->accountinfo_db($username));
        header("location: FoundationChangePassword.php");
    }

    private function changePassword() {
        $username = $_POST['id'];
        $password = $_POST['password1'];
        $this->foundation_db_class->changepassword_db($username, $password);
        $_SESSION['foundationdataobj'] = serialize($this->foundation_db_class->accountinfo_db($username));
        header("location: FoundationSettings.php");
    }

    private function prepareChangeLogo() {
        $username = $_POST['id'];
        $_SESSION['foundationdataobj'] = serialize($this->foundation_db_class->accountinfo_db($username));
        header("location: FoundationChangeLogo.php");
    }

    private function changeLogo() {
        $foundationID = $_POST['id'];
        $password = $_FILES['photo']['name'];

        mkdir("../Database/Images/Foundation/" . $foundationID . "");

        //=============
        $ext = substr($_FILES['photo']['type'], -4);

        if (substr($ext, 0, 1) == "/") {
            $ext = substr($ext, -3);
        }

        $filepath = "../Database/Images/Foundation/" . $foundationID . "/photo." . $ext;

        if (move_uploaded_file($_FILES['photo']['tmp_name'], $filepath)) {
            $urlphoto = $foundationID . "/photo." . $ext;
        }
        $dbCondition = $this->foundation_db_class->changelogo_db($foundationID, $urlphoto);




        $_SESSION['foundationdataobj'] = serialize($this->foundation_db_class->accountinfo_db($foundationID));
        header("location: FoundationSettings.php");
    }

    private function post() {
        $foundationID = $_POST['id'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $photo = $_FILES['photo']['name'];

        if ($photo == "") {
            $urlfile = "";
        } else {
            $ext = substr($_FILES['photo']['type'], -4);

            if (substr($ext, 0, 1) == "/") {
                $ext = substr($ext, -3);
            }
            $timestamp=md5(time());
            $filepath = "../Database/Images/Foundation/" . $foundationID ."/__Post/".$timestamp."." . $ext;

            if (move_uploaded_file($_FILES['photo']['tmp_name'], $filepath)) {
                $urlfile = $foundationID ."/__Post/".$timestamp. "." . $ext;
            }
        }
        
        $this->foundation_db_class = new FoundationDAO();

        $dbCondition = $this->foundation_db_class->addPost_db($foundationID, $title, $content, $urlfile);

$foundation=$this->foundation_db_class->accountinfo_db($foundationID);
        if ($dbCondition == true) {
             $_SESSION['foundationdataobj']=  serialize(array($foundation->getName(),$foundation->getPhoto()));
             $_SESSION['foundationpost'] = serialize($this->foundation_db_class->listPost_db($foundationID));
        header("location: FoundationProfile.php");
        } else {
          
             $_SESSION['foundationdataobj']=  serialize(array($foundation->getName(),$foundation->getPhoto()));
            $ $_SESSION['foundationpost'] = serialize($this->foundation_db_class->listPost_db($foundationID));
        header("location: FoundationProfile.php");
        }
    }

    private function profile(){
        $foundationID = $_POST['foundationid'];
        $foundation=$this->foundation_db_class->accountinfo_db($foundationID);
        $_SESSION['foundationdataobj']=  serialize(array($foundation->getName(),$foundation->getPhoto()));
        $_SESSION['foundationpost'] = serialize($this->foundation_db_class->listPost_db($foundationID));
        header("location: FoundationProfile.php");
        
    }
    
    private function deletePost(){
        $postid=$_POST['postid'];
        $this->foundation_db_class->deletePost_db($postid);
        
        $foundationID = $_POST['foundationid'];
        $foundation=$this->foundation_db_class->accountinfo_db($foundationID);
        $_SESSION['foundationdataobj']=  serialize(array($foundation->getName(),$foundation->getPhoto()));
        $_SESSION['foundationpost'] = serialize($this->foundation_db_class->listPost_db($foundationID));
        header("location: FoundationProfile.php");
        
    }
}

?>
