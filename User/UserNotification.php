<?php
session_start();
$userdata = unserialize($_SESSION['userdata']);
include 'User.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/mainMenuCss.css">
        <link rel="stylesheet" type="text/css" href="../css/notifMenu.css">
        <title>My Notifications</title>

    </head>
    <body class="Background">
        <?php include 'UserHeader.php' ?>
        <?php include 'Logo.php' ?>


        <div class="row">

            <div class="container">
                <div class="row-fluid">
                    <div class="span2 paddingLeft">

                        <?php include('UserNavigation.php'); ?>

                    </div>

                    <div class="span9">

                        <?php include 'PostStatus.php'; ?>

                        <div class="row-fluid margin-top">
                            <!-- Main Menu Class -->
                            <div class="span12">

                                <div class="row-fluid">
                                    <div class="notifFeedTop">
                                        <div class="myFont">
                                            <p class="myFont"> Notification </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row-fluid">
                                    <div class="notifFeedMiddle">

                                        <?php
                                        $peopleList = unserialize($_SESSION['peoplelistdataobj']);

                                        if (count($peopleList) > 0) {

                                            for ($i = 0; $i < count($peopleList); $i++) {
                                                $temp = $peopleList[$i]; //get the foundation object from array
                                                //store the object to separate variable
                                                $peopleID = $temp->getSponsorID();
                                                $password = $temp->getPassword();
                                                $email = $temp->getEmail();
                                                $name = $temp->getName();

                                                $address = $temp->getAddress();
                                                $city = $temp->getCity();
                                                $state = $temp->getState();
                                                $country = $temp->getCountry();
                                                $postalCode = $temp->getPostalCode();

                                                $phone = $temp->getPhone();
                                                $photo = $temp->getPhoto();
                                                $coins = $temp->getCoins();
                                                ?>



                                                <div style="float:left" >
                                                    <div>
                                                        <img  style="width:150px;margin:15px; height:150px; float:left" src="<? echo "../Database/Images/Sponsor/" . $photo; ?>" />
                                                        <form name="sponsorprofile<?php echo md5($i) ?>" action="PeopleCtrl.php" method="post">
                                                            <input type="hidden" name="action" value="seepeopleprofile">
                                                            <input type="hidden" name="peopleSelectedID" value="<? echo $peopleID ?>">

                                                        </form>
                                                    </div>

                                                    <div>
                                                        <p style="padding:25px; text-align:left; position: relative; vertical-align: middle; width:400px" >
                                                            <a href="javascript: sponsorprofile<?php echo md5($i) ?>()"><font size="5"><?php echo $name; ?></font></br></a>
                                                            <script>
                                                                function sponsorprofile<?php echo md5($i) ?>() {
                                                                    document.sponsorprofile<?php echo md5($i) ?>.submit();
                                                                }
                                                            </script>
                                                            <?php echo $email; ?></br>
                                                            <?php if ($city != "") echo $city . "</br>"; ?>
                                                            <?php if ($state != "") echo $state . "</br>"; ?>
                                                            <?php if ($country != "") echo $country . "</br>"; ?>
                                                            <?php if ($phone != "") echo $phone . "</br>"; ?>

                                                        </p>
                                                    </div>

                                                    <div class="row-fluid marginBtnNotif">
                                                        <div class="span2">
                                                            <form action="PeopleCtrl.php" method="post">
                                                                <input type="hidden" name="action" value="approveneighbour">
                                                                <input type="hidden" name="peopleID" value="<? echo $peopleID ?>">
                                                                <input type="submit" class="btnApprove span12" value="">
                                                            </form>
                                                        </div>
                                                        <div class="span2">
                                                            <form action="PeopleCtrl.php" method="post">
                                                                <input type="hidden" name="action" value="removeneighbour">
                                                                <input type="hidden" name="peopleID" value="<? echo $peopleID ?>">
                                                                <input type="submit" class="btnDecline span12" value="">
                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div style="clear:both">

                                                </div>



                                                <?
                                            }
                                            ?>

                                            <?
                                        } else {
                                            echo 'Not Avaiable';
                                        }
                                        ?>

                                    </div>
                                </div>

                                <div class="row-fluid">
                                    <div class="notifFeedBot">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <?php include 'UserModal.php' ?>

                </div>
            </div>

            <?php include 'Footer.php' ?>
            <?php include 'Script.php' ?>

    </body>

</html>