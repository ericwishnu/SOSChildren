<?php
session_start();
include 'User.php';


$userdata = unserialize($_SESSION['userdata']);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/mainMenuCss.css">
        <title>Neighbor List</title>
        <style>

            .thumbnail{
                margin:10px;
                float:left;
                position:inherit;
            }
            .neighbourphoto{
                width:210px;
                height:210px;
                clear:both;
                text-align: center;
            }
            .neighbourname{
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
                                    <div class="friendsFeedTop">
                                        <div class="myFont">
                                            <p class="myFont">Neighbour</p>
                                        </div>
                                    </div>
                                </div>


                                <div class="row-fluid">
                                    <div class="friendsFeedMiddle">

                                        <br/>
                                        <div class="row-fluid">

                                            <?php
                                            $peopleList = unserialize($_SESSION['peoplelistdataobj']);

                                            if (count($peopleList) > 0) {
                                                ?>


                                                <?
                                                for ($i = 0; $i < count($peopleList); $i++) {
                                                    $temp = $peopleList[$i]; //get the foundation object from array
                                                    //store the object to separate variable
                                                    $peopleID = $temp->getSponsorID();
                                                    $password = $temp->getPassword();
                                                    $email = $temp->getEmail();
                                                    $peopleName = $temp->getName();

                                                    $address = $temp->getAddress();
                                                    $city = $temp->getCity();
                                                    $state = $temp->getState();
                                                    $country = $temp->getCountry();
                                                    $postalCode = $temp->getPostalCode();

                                                    $phone = $temp->getPhone();
                                                    $photo = $temp->getPhoto();
                                                    $coins = $temp->getCoins();
                                                    ?>


                                                    <div class="thumbnail">
                                                        <form name="sponsorprofile<?php echo $i ?>" action="PeopleCtrl.php" method="POST">

                                                            <input type="hidden" name="action" value="seepeopleprofile">
                                                            <input type="hidden" name="peopleSelectedID" value="<? echo $peopleID ?>">
                                                            <div>
                                                                <a href="javascript: sponsorprofile<?php echo$i ?>()">
                                                                    <img class="neighbourphoto" src="../Database/Images/Sponsor/<? echo $photo; ?>" />
                                                                </a>
                                                            </div>
                                                            <div class="neighbourname"><? echo $peopleName; ?></div>

                                                            <script type="text/javascript">
                                                                function sponsorprofile<?php echo$i ?>()
                                                                {
                                                                    document.sponsorprofile<?php echo$i ?>.submit();
                                                                }
                                                            </script>

                                                        </form>
                                                    </div>
                                                    <?
                                                }
                                                ?>
                                                </table>
                                                <?
                                            } else {
                                                echo 'Not Avaiable';
                                            }
                                            ?>

                                        </div>
                                    </div>
                                </div>

                                <div class="row-fluid">
                                    <div class="friendsFeedBot">
                                    </div>
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
