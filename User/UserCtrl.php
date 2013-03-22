<?php

//FOR USER
session_start();
include 'userDAO.php';

$test = new UserCtrl();
$test->run();

class UserCtrl {

    private $user_db_class;

    public function UserCtrl() {
        $this->user_db_class = new UserDAO();
    }

    public function run() {

        $_SESSION['fosterKids'] = "";
        $_SESSION['receivedamount'] = "";
        $_SESSION['mycoin'] = "";

        $page = $_POST['action'];

        if ($page == "login") {
            $this->login();
        } else if ($page == "mainpage") {
            $this->mainpage();
        } else if ($page == "usersignup") {
            $this->signup();
        } else if ($page == "viewprofile") {
            $this->viewProfile();
        } elseif ($page == "settings") {
            $this->settings();
        } else if ($page == "preeditprofile") {
            $this->preEditProfile();
        } else if ($page == "editprofile") {
            $this->editProfile();
        } else if ($page == "logout") {
            $this->logout();
        } elseif ($page == "preparechangepassword") {
            $this->prepareChangePassword();
        } elseif ($page == "changepassword") {
            $this->changePassword();
        } elseif ($page == "preparechangepicture") {
            $this->prepareChangePicture();
        } elseif ($page == "changepicture") {
            $this->changePicture();
        } elseif ($page == "addpost") {
            $this->post();
        } elseif ($page == "coinpage") {
            $this->coinpage();
        } elseif ($page == "addcoin") {
            $this->addcoin();
        } elseif ($page == "deletepost") {
            $this->deletePost();
        }
    }

    private function login() {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $this->user_db_class = new UserDAO();
        $dbCheck = $this->user_db_class->login_db($username, $password);

        if ($dbCheck == TRUE) {
            $_SESSION['usernameU'] = $_POST['username'];
            $userdata = $this->user_db_class->getuserdata_db($username);
            $_SESSION['userdata'] = serialize($userdata[0]);
            $_SESSION['newsfeeddataobj'] = serialize($this->user_db_class->viewnewsfeed_db($username));

            header('location: MainPage.php');
        } else {
            $_SESSION['message'] = "Login Failed";

            header('location: UserLogin.php');
        }
    }

    private function mainpage() {
        $username = $_POST['sponsorID'];
        $_SESSION['newsfeeddataobj'] = serialize($this->user_db_class->viewnewsfeed_db($username));
        header("location: MainPage.php");
    }

    private function logout() {
        session_destroy();
        header("location: UserLogin.php");
    }

    private function signup() {
        $sponsortype = $_SESSION['sponsortype'];
        $sponsorID = $_SESSION['email'];
        $password = $_SESSION['password1'];
        $email = $_SESSION['email'];
        $name = "";
        $address = "";
        $city = "";
        $state = "";
        $country = "";
        $postalcode = "";
        $phone = "";
        $photo = "";
        if ($sponsortype == "public") {
            $name = $_SESSION['name'];

            $address = $_SESSION['address'];
            $city = $_SESSION['city'];
            $state = $_SESSION['state'];
            $country = $_SESSION['country'];
            $postalcode = $_SESSION['zipcode'];
            $phone = $_SESSION['phone'];
            $photo = $_FILES['photo']['name'];
        } else {

            $name = "Ninja";
        }
        mkdir("../Database/Images/Sponsor/" . $sponsorID . "");
        mkdir("../Database/Images/Sponsor/" . $sponsorID . "/__Post");
        //=============

        if ($photo == '' || $photo == null) {
            if ($sponsortype == "public") {
                $urlphoto = 'DefaultUser.jpg';

                $defaultpath = "../Database/Images/Sponsor/DefaultUser.jpg";
                $filepath = "../Database/Images/Sponsor/" . $sponsorID . "/DefaultUser.jpg";
            } else {
                $urlphoto = 'DefaultNinja.jpg';
                $defaultpath = "../Database/Images/Sponsor/DefaultNinja.jpg";
                $filepath = "../Database/Images/Sponsor/" . $sponsorID . "/DefaultNinja.jpg";
            }
            if (move_uploaded_file($defaultpath, $filepath)) {
                if ($sponsortype == "public") {
                    $urlphoto = $sponsorID . "/DefaultUser.jpg";
                } else {
                    $urlphoto = $sponsorID . "/DefaultNinja.jpg";
                }
            }
        } else {
            $ext = substr($_FILES['photo']['type'], -4);

            if (substr($ext, 0, 1) == "/") {
                $ext = substr($ext, -3);
            }
            $timestamp = md5(time());
            $filepath = "../Database/Images/Sponsor/" . $sponsorID . "/photo" . $timestamp . "." . $ext;

            if (move_uploaded_file($_FILES['photo']['tmp_name'], $filepath)) {
                $urlphoto = $sponsorID . "/photo" . $timestamp . "." . $ext;
            }
        }

        echo $sponsorID . $password . $email;

        if ($sponsortype == "public") {
            $result = $this->user_db_class->signup_db($sponsorID, $password, $email, $name, $address, $city, $state, $country, $postalcode, $phone, $urlphoto);
        } else {
            $result = $this->user_db_class->signupninja_db($sponsorID, $password, $email, $urlphoto);
            echo "ninja chiat";
            echo $result;
        }



        if (!$result) {
            $_SESSION['message'] = "Sign Up Failed!";
            header('location: UserLogin.php');
        } else {
            $_SESSION['message'] = "Sign Up Success!";
            if ($sponsortype == "public") {
                header('location: UserSignUp.php?p_id=8');
            } else {
                header("location: UserLogin.php");
            }
        }
    }

    private function post() {
        $userID = $_POST['id'];
        $photo = $_FILES['photo']['name'];
        $content = $_POST['content'];


        if ($photo == "") {
            $urlfile = "";

            $dbCondition = $this->user_db_class->addPostNoPhoto_db($userID, $content);
        } else {
            $ext = substr($_FILES['photo']['type'], -4);

            if (substr($ext, 0, 1) == "/") {
                $ext = substr($ext, -3);
            }
            $timestamp = md5(time());
            $filepath = "../Database/Images/Sponsor/" . $userID . "/__Post/" . $timestamp . "." . $ext;

            if (move_uploaded_file($_FILES['photo']['tmp_name'], $filepath)) {
                $urlfile = $userID . "/__Post/" . $timestamp . "." . $ext;
            }
            $dbCondition = $this->user_db_class->addPost_db($userID, $content, $urlfile);
        }

        //$this->user_db_class = new UserDAO();
        echo $photo;
        echo $urlfile;

        ///belom kelar

        if ($dbCondition == true) {
            //$_SESSION['userdataobj'] = serialize($this->user_db_class->accountinfo_db($userID));
            // $_SESSION['userpost'] = serialize($this->user_db_class->listPost_db($userID));
            $_SESSION['newsfeeddataobj'] = serialize($this->user_db_class->viewnewsfeed_db($userID));
            header("location: MainPage.php");
        } else {

            //$_SESSION['userdataobj'] = serialize($this->user_db_class->accountinfo_db($userID));
            //$_SESSION['userpost'] = serialize($this->user_db_class->listPost_db($userID));
            $_SESSION['newsfeeddataobj'] = serialize($this->user_db_class->viewnewsfeed_db($userID));
            header("location: MainPage.php");
        }
    }

    private function deletePost() {
        $postid = $_POST['postid'];
        $this->user_db_class->deletePost_db($postid);

        $userID = $_POST['userid'];
        //$user=$this->user_db_class->accountinfo_db($userID);
        //$_SESSION['userdataobj']=  serialize(array($user->getName(),$user->getPhoto()));
        $_SESSION['userpost'] = serialize($this->user_db_class->listPost_db($userID));
        header("location: UserProfile.php");
    }

    private function settings() {
        $username = $_SESSION['usernameU'];
        $_SESSION['userdataobj'] = serialize($this->user_db_class->accountinfo_db($username));
        header("location: UserSettings.php");
    }

    private function viewProfile() {
        $username = $_SESSION['usernameU'];
        $_SESSION['userdataobj'] = serialize($this->user_db_class->accountinfo_db($username));
        $_SESSION['userpost'] = serialize($this->user_db_class->listPost_db($username));
        header("location: UserProfile.php");
    }

    private function preEditProfile() {
        $username = $_SESSION['usernameU'];
        $_SESSION['userdataobj'] = serialize($this->user_db_class->accountinfo_db($username));
        header("location: UserEditProfile.php");
    }

    private function editProfile() {
        $username = $_SESSION['usernameU'];
        //$password = $_POST['password1'];
        $email = $_POST['email'];
        $name = $_POST['name'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $country = $_POST['country'];
        $postalCode = $_POST['postalcode'];
        $phone = $_POST['phone'];

        $this->user_db_class->editprofile_db($username, $name, $address, $city, $state, $country, $postalCode, $email, $phone);
        header("location: UserSettings.php");
    }

    private function prepareChangePassword() {
        $username = $_POST['id'];
        $_SESSION['userdataobj'] = serialize($this->user_db_class->accountinfo_db($username));
        header("location: UserChangePassword.php");
    }

    private function changePassword() {
        $username = $_POST['id'];
        $password = $_POST['password1'];
        $this->user_db_class->changepassword_db($username, $password);
        $_SESSION['userdataobj'] = serialize($this->user_db_class->accountinfo_db($username));
        header("location: UserSettings.php");
    }

    private function prepareChangePicture() {
        $username = $_POST['id'];
        $_SESSION['userdataobj'] = serialize($this->user_db_class->accountinfo_db($username));
        header("location: UserChangePicture.php");
    }

    private function coinpage() {
        $username = $_SESSION['usernameU'];
        $_SESSION['mycoinamount'] = $this->user_db_class->getusercoin_db($username);
        header("location: CoinMenu.php");
    }

<<<<<<< HEAD
    private function changePicture() {
        $sponsorID = $_POST['id'];
        $photo = $_FILES['photo']['name'];
        $prevphoto = $_POST['prevphoto'];
=======
private function addcoin() {
    $username = $_SESSION['usernameU'];
    $quantity = $_POST['quantityadd'];
    $this->user_db_class->addcoin_db($username,$quantity);
    $_SESSION['mycoinamount'] = $this->user_db_class->getusercoin_db($username);
    header("location: CoinMenu.php");
}

private function changePicture() {
    $sponsorID = $_POST['id'];
    $photo = $_FILES['photo']['name'];
    $prevphoto = $_POST['prevphoto'];
>>>>>>> Hahhahahahhahahahahaha jam 3

        if ($photo == "") {
            $urlphoto = $prevphoto;
        } else {
            mkdir("../Database/Images/Sponsor/" . $sponsorID . "");

            //=============
            $ext = substr($_FILES['photo']['type'], -4);

            if (substr($ext, 0, 1) == "/") {
                $ext = substr($ext, -3);
            }
            $timestamp = md5(time());
            $filepath = "../Database/Images/Sponsor/" . $sponsorID . "/" . $timestamp . "." . $ext;

            if (move_uploaded_file($_FILES['photo']['tmp_name'], $filepath)) {
                $urlphoto = $sponsorID . "/" . $timestamp . "." . $ext;
            }
        }

        $dbCondition = $this->user_db_class->changepicture_db($sponsorID, $urlphoto);

        if ($dbCondition == true) {

            $_SESSION['userdataobj'] = serialize($this->user_db_class->accountinfo_db($sponsorID));
            header("location: UserSettings.php");
        }

        $_SESSION['userdataobj'] = serialize($this->user_db_class->accountinfo_db($sponsorID));
        header("location: UserSettings.php");
    }

}

?>