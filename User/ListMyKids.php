<?
session_start();
include 'Kids.php';

$userdata = unserialize($_SESSION['userdata']);
$kids_list = unserialize($_SESSION['mykidslistdataobj']);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/mainMenuCss.css">
        <title>My Kids</title>
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
    </head >
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
                                            <p class="myFont">My Kids</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row-fluid">
                                    <div class="kidsFeedMiddle">

                                        <div class="row-fluid">
                                            <?php
                                            if (!is_array($kids_list)) {
                                                echo "<p>No Kids currently available</p>";
                                            } else {

                                                for ($i = 0; $i < sizeof($kids_list); $i++) {
                                                    $kidsID = $kids_list[$i]->getKidsId();
                                                    $name = $kids_list[$i]->getName();
                                                    $photo = $kids_list[$i]->getPhoto();
                                                    $DOB = $kids_list[$i]->getDOB();
                                                    $age = $kids_list[$i]->getAge();
                                                    $background = $kids_list[$i]->getBackground();
                                                    $region = $kids_list[$i]->getRegion();
                                                    $origin = $kids_list[$i]->getOrigin();
                                                    $aspiration = $kids_list[$i]->getAspiration();
                                                    $health = $kids_list[$i]->getHealth();
                                                    $education = $kids_list[$i]->getEducation();
                                                    $nutrition = $kids_list[$i]->getNutrition();
                                                    $foundationID = $kids_list[$i]->getFoundationID();
                                                    ?>
                                                    <div class="thumbnail">
                                                        <div>
                                                            <form name="kidsprofile<?php echo md5($i)?>" action="KidsCtrl.php" method="POST">
                                                                <input type="hidden" name="action" value="kidsprofile"/>
                                                                <input type="hidden" name="kidsSelectedID" value="<?php echo $kidsID; ?>"/>

                                                            </form>
                                                            <a href="javascript: viewkidsprofile<?php echo md5($i)?>()">
                                                                <img class="kidsphoto" src="../Database/Images/Kids/<?php echo $photo ?>"/>
                                                            </a>
                                                            <script>
                                                                function viewkidsprofile<?php echo md5($i)?>() {
                                                                    document.kidsprofile<?php echo md5($i)?>.submit();
                                                                }
                                                            </script>
                                                        </div>
                                                        <div class="kidsname"><?php echo $name; ?></div>
                                                        <div class="kidsaspiration">Aspiration: <?php echo $aspiration; ?></div>
                                                    </div>

                                                    <?
                                                }
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
                    </div>
                    <?php include 'UserModal.php' ?>
                </div>
            </div>
            <?php include 'Footer.php' ?>
            <?php include 'Script.php' ?>
    </body>
</html>
