<?php

session_start();
include 'Foundation.php';
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
        if ($page == "preaddfoundation") {
            $this->preAddFoundation();
        } elseif ($page == "addfoundation") {
            $this->addFoundation();
        } elseif ($page == "listfoundation") {
            $this->listfoundation();
        } elseif ($page == "prepareeditfoundation") {
            $this->prepareEditFoundation();
        } elseif ($page == "editfoundation") {
            $this->editFoundation();
        } elseif ($page == "preparechangepassword") {
            $this->prepareChangePassword();
        } elseif ($page == "changepassword") {
            $this->changePassword();
        } elseif ($page == "preparechangelogo") {
            $this->prepareChangeLogo();
        } elseif ($page == "changelogo") {
            $this->changeLogo();
        } elseif ($page == "deletefoundation") {
            $this->deleteFoundation();
        }
    }

    private function listFoundation() {
        $_SESSION['foundationlistdataobj'] = serialize($this->foundation_db_class->listFoundation_db());
        header("location: FoundationList.php");
    }

    private function preAddFoundation() {
        header("location: FoundationAdd.php");
    }

    private function addFoundation() {
        $foundationID = $_POST['id'];
        $password = $_POST['password1'];
        $confirmpassword = $_POST['password2'];
        $name = $_POST['name'];
        $photo = $_FILES['photo']['name'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $country = $_POST['country'];
        $postalCode = $_POST['postalcode'];
        $accountNo = $_POST['accnum'];
        $phone = $_POST['phone'];
        $description = $_POST['description'];


        if ($password == $confirmpassword) {
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
            
              
            $filepath = "../Database/Images/Kids/" . $foundationID . "." . $ext;

            if (move_uploaded_file($_FILES['photo']['tmp_name'], $filepath)) {
                $urlfile = $foundationID . "." . $ext;
            }

            $dbCondition = $this->foundation_db_class->addFoundation_db($foundationID, $password, $name, $urlphoto, $address, $city, $state, $country, $postalCode, $accountNo, $phone, $description);

            if ($dbCondition == true) {

                $_SESSION['foundationsignup'] = "success";
                $this->listFoundation();
            }
        }
    }

    private function prepareEditFoundation() {
        $username = $_POST['foundationSelected'];
        $_SESSION['foundationdataobj'] = serialize($this->foundation_db_class->accountinfo_db($username));
        header("location: FoundationEdit.php");
    }

    private function editFoundation() {
        //$prevFoundation=  unserialize($_SESSION['foundationdataobj']);
        $username = $_POST['id'];
        $name = $_POST['name'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $country = $_POST['country'];
        $postalCode = $_POST['postalcode'];
        $accountNo = $_POST['accnum'];
        $phone = $_POST['phone'];
        $description = $_POST['description'];

        $this->foundation_db_class->editprofile_db($username, $name, $address, $city, $state, $country, $postalCode, $accountNo, $phone, $description);

        $this->listFoundation();
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
        header("location: FoundationEdit.php");
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

        if ($dbCondition == true) {

            $_SESSION['foundationsignup'] = "success";
            $this->listFoundation();
        }


        $_SESSION['foundationdataobj'] = serialize($this->foundation_db_class->accountinfo_db($foundationID));
        header("location: FoundationEdit.php");
    }

    private function deleteFoundation() {
        $username = $_POST['foundationSelected'];
        $this->foundation_db_class->deletefoundation_db($username);
        $this->listFoundation();
    }

}

?>
