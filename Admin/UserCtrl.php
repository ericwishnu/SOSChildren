<?php
//FOR ADMIN
session_start();
include 'UserDAO.php';

$test = new UserCtrl();
$test->run();

class UserCtrl {

    private $user_db_class;

    public function UserCtrl() {
        $this->user_db_class = new UserDAO();
    }

    public function run() {
        $page = $_POST['action'];
        if ($page == "preadduser") {
            $this->preAddUser();
        } elseif ($page == "adduser") {
            $this->addUser();
        } elseif ($page == "listuser") {
            $this->listUser();
        } elseif ($page == "prepareedituser") {
            $this->prepareEditUser();
        } elseif ($page == "edituser") {
            $this->editUser();
        } elseif ($page == "preparechangepassword") {
            $this->prepareChangePassword();
        } elseif ($page == "changepassword") {
            $this->changePassword();
        } elseif ($page == "preparechangepicture") {
            $this->prepareChangePicture();
        } elseif ($page == "changepicture") {
            $this->changePicture();
        } elseif ($page == "deleteuser"){
            $this->deleteUser();
        }
    }

    private function preAddUser() {
        header("location: UserAdd.php");
    }

    private function addUser() {
        $sponsorID = $_POST['id'];
        $password = $_POST['password1'];
        $confirmpassword = $_POST['password2'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $country = $_POST['country'];
        $postalCode = $_POST['postalcode'];
        $photo = $_FILES['photo']['name'];
        $phone = $_POST['phone'];
        $coins = $_POST['coins'];

        if ($password == $confirmpassword) {
            mkdir("../Database/Images/Sponsor/" . $sponsorID . "");
            mkdir("../Database/Images/Sponsor/" . $sponsorID . "__Post");
            //=============
            $ext = substr($_FILES['photo']['type'], -4);

            if (substr($ext, 0, 1) == "/") {
                $ext = substr($ext, -3);
            }
            $timestamp=md5(time());
            $filepath = "../Database/Images/Sponsor/" . $sponsorID . "/photo".$timestamp .".". $ext;

            if (move_uploaded_file($_FILES['photo']['tmp_name'], $filepath)) {
                $urlphoto = $sponsorID . "/photo" .$timestamp.".". $ext;
            }

            $dbCondition = $this->user_db_class->addUser_db($sponsorID, $password, $email, $name, $address, $city, $state, $country, $postalCode, $phone, $urlphoto, $coins);

            if ($dbCondition == true) {

                
                $this->listUser();
            }
        }
    }

    private function listUser() {
        $_SESSION['userlistdataobj'] = serialize($this->user_db_class->listUser_db());
        header("location: UserList.php");
    }

    private function prepareEditUser() {
        $username = $_POST['userSelected'];
        $_SESSION['sponsordataobj'] = serialize($this->user_db_class->accountinfo_db($username));
        header("location: UserEdit.php");
    }

    private function editUser() {
        //$prevFoundation=  unserialize($_SESSION['foundationdataobj']);
        $username = $_POST['id'];
        $name = $_POST['name'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $country = $_POST['country'];
        $postalCode = $_POST['postalcode'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $coins = $_POST['coins'];

        $this->user_db_class->editprofile_db($username, $name, $address, $city, $state, $country, $postalCode, $email, $phone, $coins);

        $this->listUser();
    }

    private function prepareChangePassword() {
        $username = $_POST['id'];
        $_SESSION['sponsordataobj'] = serialize($this->user_db_class->accountinfo_db($username));
        header("location: UserChangePassword.php");
    }

    private function changePassword() {
        $username = $_POST['id'];
        $password = $_POST['password1'];
        $this->user_db_class->changepassword_db($username, $password);
        $_SESSION['sponsordataobj'] = serialize($this->user_db_class->accountinfo_db($username));
        header("location: UserEdit.php");
    }

    private function prepareChangePicture() {
        $username = $_POST['id'];
        $_SESSION['sponsordataobj'] = serialize($this->user_db_class->accountinfo_db($username));
        header("location: UserChangePicture.php");
    }

    private function changePicture() {
        $sponsorID = $_POST['id'];
        $photo = $_FILES['photo']['name'];

        mkdir("../Database/Images/Sponsor/" . $sponsorID . "");

        //=============
        $ext = substr($_FILES['photo']['type'], -4);

        if (substr($ext, 0, 1) == "/") {
            $ext = substr($ext, -3);
        }

        $filepath = "../Database/Images/Sponsor/" . $sponsorID . "/photo." . $ext;

        if (move_uploaded_file($_FILES['photo']['tmp_name'], $filepath)) {
            $urlphoto = $sponsorID . "/photo." . $ext;
        }
        $dbCondition = $this->user_db_class->changepicture_db($sponsorID, $urlphoto);

        if ($dbCondition == true) {


            $this->listUser();
        }


        $_SESSION['sponsordataobj'] = serialize($this->user_db_class->accountinfo_db($sponsorID));
        header("location: UserEdit.php");
    }

    private function deleteUser(){
        $username = $_POST['userSelected'];
        $this->user_db_class->deleteuser_db($username);
        $this->listUser();
    }
}

?>
