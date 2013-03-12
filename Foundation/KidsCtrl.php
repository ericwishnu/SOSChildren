<?php

session_start();
include 'KidsDAO.php';

$test = new KidsCtrl();
$test->run();

class KidsCtrl {

    private $kids_db_class;

    public function KidsCtrl() {
        $this->kids_db_class = new KidsDAO();
    }

    public function run() {
        $page = $_POST['action'];
        if ($page == "listkids") {
            $this->listKids();
        } elseif ($page == "prepareaddkids") {
            $this->prepareAddKid();
        } elseif ($page == "addkid") {
            $this->addKid();
        } elseif ($page == "prepareeditkid") {
            $this->prepareEditKid();
        } elseif ($page == "editkid") {
            $this->editKid();
        } elseif ($page == "preparechangepicture") {
            $this->prepareChangePicture();
        } elseif ($page == "changepicture") {
            $this->changePicture();
        }
    }

    private function listKids() {
        $foundationID = $_POST['foundationid'];
        $_SESSION['kidslistdataobj'] = serialize($this->kids_db_class->listKids_db($foundationID));
        header("location: KidsList.php");
    }

    private function prepareAddKid() {
        $foundationID=$_POST['foundationid'];
        $_SESSION['foundationid']=$foundationID;
        header("location: KidsAdd.php");
    }

    private function addKid() {
        $foundationID = $_SESSION['foundationid'];

        $kidsID = $_POST['kidsID'];
        $kidsname = $_POST['kidsname'];
        $foundationID = $_POST['foundationid'];
        $photo = $_FILES['photo']['name'];

        $DOB = $_POST['DOB'];
        $background = $_POST['background'];
        $region = $_POST['region'];
        $origin = $_POST['origin'];
        $aspiration = $_POST['aspiration'];

        $health = 0;
        $education = 0;
        $nutrition = 0;
        if (isset($_POST['health']) == "true") {
            $health = 1;
        }
        if (isset($_POST['education']) == "true") {
            $education = 1;
        }
        if (isset($_POST['nutrition']) == "true") {
            $nutrition = 1;
        }


        if ($kidsID == "" || $kidsname == "") {
            die;
        } else {
            if ($photo == "") {
                $urlfile = "default.jpg";
            } else {
                $ext = substr($_FILES['photo']['type'], -4);

                if (substr($ext, 0, 1) == "/") {
                    $ext = substr($ext, -3);
                }

                $filepath = "../Database/Images/Kids/" . $kidsID . "." . $ext;

                if (move_uploaded_file($_FILES['photo']['tmp_name'], $filepath)) {
                    $urlfile = $kidsID . "." . $ext;
                }
            }

            $this->kids_db_class = new KidsDAO();

            $dbCondition = $this->kids_db_class->addKid_db($foundationID, $kidsID, $kidsname, $urlfile, $DOB, $background, $region, $origin, $aspiration, $health, $education, $nutrition);


            if ($dbCondition == true) {
                //$foundationID=$_SESSION['foundationID'];
                $_SESSION['kidslistdataobj'] = serialize($this->kids_db_class->listKids_db($foundationID));
                header("location: KidsList.php");
            } else {
                $_SESSION['addKids'] = "failed";
                // $foundationID=$_SESSION['foundationID'];
                $_SESSION['kidslistdataobj'] = serialize($this->kids_db_class->listKids_db($foundationID));
                header("location: KidsAdd.php");
            }
        }
    }

    private function prepareEditKid() {

        $username = $_POST['kidSelected'];
        //$_SESSION['foundationdataobj'] = serialize($this->kids_db_class->getFoundation_db());
        $_SESSION['kiddataobj'] = serialize($this->kids_db_class->kidsinfo_db($username));
        header("location: KidsEdit.php");
    }

    private function editKid() {
        $kidsID = $_POST['kidid'];
        $foundationID = $_POST['foundationid'];
        $name = $_POST['name'];
        $DOB = $_POST['dob'];
        $background = $_POST['background'];
        $region = $_POST['region'];
        $origin = $_POST['origin'];
        $aspiration = $_POST['aspiration'];

        //echo $kidsID."|".$foundationID."|".$name."|".$DOB."|".$background."|".$region."|".$aspiration;

        if (isset($_POST['health']) == "true") {
            $health = 1;
        } else {
            $health = 0;
        }

        if (isset($_POST['education']) == "true") {
            $education = 1;
        } else {
            $education = 0;
        }

        if (isset($_POST['nutrition']) == "true") {
            $nutrition = 1;
        } else {
            $nutrition = 0;
        }

        $this->kids_db_class = new KidsDAO();
        $dbCondition = $this->kids_db_class->editkidlistfoundation_db($kidsID, $foundationID);
        $dbCondition = $this->kids_db_class->editKid_db($foundationID, $kidsID, $name, $DOB, $background, $region, $origin, $aspiration, $health, $education, $nutrition);


        if ($dbCondition == true) {
            $this->listKids();
        } else {
            $_SESSION['editKids'] = "failed";
            $this->listKids();
        }
    }

    private function prepareChangePicture() {

        $username = $_POST['id'];
        $_SESSION['kidsdataobj'] = serialize($this->kids_db_class->kidsinfo_db($username));
        header("location: KidsChangePicture.php");
    }

    private function changePicture() {
        $kidsID = $_POST['id'];
        $password = $_FILES['photo']['name'];

        mkdir("../Database/Images/Kids/" . $kidsID . "");

        //=============
        $ext = substr($_FILES['photo']['type'], -4);

        if (substr($ext, 0, 1) == "/") {
            $ext = substr($ext, -3);
        }

        $filepath = "../Database/Images/Kids/" . $kidsID . "/photo." . $ext;

        if (move_uploaded_file($_FILES['photo']['tmp_name'], $filepath)) {
            $urlphoto = $kidsID . "/photo." . $ext;
        }
        $dbCondition = $this->kids_db_class->changepicture_db($kidsID, $urlphoto);

        if ($dbCondition == true) {


            $this->listKids();
        }


        //$_SESSION['foundationdataobj'] = serialize($this->kids_db_class->getFoundation_db());
        $_SESSION['kiddataobj'] = serialize($this->kids_db_class->kidsinfo_db($kidsID));
        header("location: KidsEdit.php");
    }

}

?>
