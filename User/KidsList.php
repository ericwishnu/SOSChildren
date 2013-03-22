<?
session_start();
include "Kids.php";
$userdata = unserialize($_SESSION['userdata']);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/mainMenuCss.css">
        <title>Kids Menu</title>
        <style>

            .thumbnail{
                margin:10px;
                float:left;
                position:inherit;
            }
            .kidsphoto{
                width:210px;
                height:210px;
                clear:both;
                text-align: center;
            }
            .kidsname{
                text-align: center;
                max-width: 210px;
            }
            .kidsaspiration{
                text-align: center;
                max-width: 210px;
            }
        </style>
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
                                    <div class="kidsFeedTop">
                                        <div class="myFont">
                                            <p class="myFont">Kids</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row-fluid">
                                <div class="kidsFeedMiddle">

                                    <br/>
                                    <div class="row-fluid">
                                        <?php
                                        if (isset($_SESSION['kidslistdataobj'])) {
                                            $kidsList = unserialize($_SESSION['kidslistdataobj']);

                                            if (count($kidsList) > 0) {
                                                for ($i = 0; $i < count($kidsList); $i++) {
                                                    $temp = $kidsList[$i]; //get the kids object from array
                                                    //store the object to separate variable
                                                    $kidsID = $temp->getKidsID();
                                                    $name = $temp->getName();
                                                    $photo = $temp->getPhoto();
                                                    $dob = $temp->getDOB();
                                                    $background = $temp->getBackground();
                                                    $region = $temp->getRegion();
                                                    $origin = $temp->getOrigin();
                                                    $aspiration = $temp->getAspiration();
                                                    $foundationID = $temp->getFoundationID();
                                                    ?>
                                                    <div class="thumbnail">
                                                        <form name="kidsprofile<?php echo $i ?>" action="KidsCtrl.php" method="POST">
                                                            <input type="hidden" name="kidsSelectedID" value="<?php echo $kidsID; ?>"/>
                                                            <input type="hidden" name="action" value="kidsprofile"/>



                                                            <div >
                                                                <a href="javascript: kidsprofile<?php echo$i ?>()">
                                                                    <img class="kidsphoto" src="../Database/Images/Kids/<? echo $photo; ?>" />
                                                                </a>
                                                            </div>
                                                            <div class="kidsname"><? echo $name; ?></div>
                                                            <div class="kidsaspiration">Aspiration: <? echo $aspiration; ?></div>

                                                            <script type="text/javascript">
                                                                function kidsprofile<?php echo$i ?>()
                                                                {
                                                                    document.kidsprofile<?php echo$i ?>.submit();
                                                                }
                                                            </script>
                                                        </form>
                                                    </div>

                                                    <?
                                                }
                                                ?>

                                                <?
                                            } else {
                                                echo 'Not Avaiable';
                                            }
                                        } else {
                                            echo 'Not Avaiable';
                                        }
                                        ?>

                                    </div>
                                </div>
                            </div>

                            <div class="row-fluid">
                                <div class="kidsFeedBot">
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php include 'UserModal.php' ?>
                </div>
            </div>
        </div>

            <?php include 'Footer.php' ?>
            <?php include 'Script.php' ?>
    </body>
</html>
