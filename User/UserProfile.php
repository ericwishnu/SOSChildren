<?
session_start();
include 'User.php';
$userdata = unserialize($_SESSION['userdata']);
$userinfo = unserialize($_SESSION['userdataobj']);
$sponsorID = $userinfo->getSponsorID();
$photo = $userinfo->getPhoto();
$email = $userinfo->getEmail();
$name = $userinfo->getName();
$address = $userinfo->getAddress();
$city = $userinfo->getCity();
$state = $userinfo->getState();
$country = $userinfo->getCountry();
$postalCode = $userinfo->getPostalCode();
$phone = $userinfo->getPhone();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/mainMenuCss.css">
        <link rel="stylesheet" type="text/css" href="../css/userProfile.css">
        <title>User Profile</title>

    </head>
    <body class="Background">
        <div class="Header" >
            <!-- Header class -->
            <div class="row">
                <div class="span12 margin-leftHeader margin-topHeader">

                    <div class="row-fluid">
                        <div class="offset7 span4 margin-rightHeader">
                            <?php include 'GlobalSearch.php' ?>
                        </div>

                        <div class="span1">
                            <?php include 'UserDropdownMenu.php'; ?>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <div class="row">
            <div class="span3 Logo">
                <!-- Logo Div  -->
            </div>
        </div>
        <div class="row">

            <div class="container">
                <div class="row-fluid">
                    <div class="span2 paddingLeft">

                        <?php include('UserNavigation.php'); ?>

                    </div>


                    <div class="span9">
                        <!-- USER POST DIVISION -->
                        <div class="row-fluid">
                            <div class="userProfilePicture span2">
                                <img src="../Database/Images/Sponsor/<? echo $photo; ?>" />
                            </div>

                            <div class="userProfilePost span9">
                                <div class="row-fluid"> 
                                    <div class="span11 offset1">
                                        <h2><? echo $name; ?></h2>
                                        <? echo $email; ?>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row-fluid margin-top">
                            <!-- Main Menu Class -->
                            <div class="span12">

                                <div class="row-fluid">
                                    <div class="userProfileTop">
                                        <div class="myFont">
                                            <p class="myFont"> Information </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row-fluid">
                                    <div class="userProfileMiddle">

                                        <table>


                                            <tr>
                                                <td>Address</td>
                                                <td width="5px"></td>
                                                <td><? echo $address; ?></td>
                                            <tr>
                                                <td>City</td>
                                                <td width="5px"></td>
                                                <td><? echo $city; ?></td>
                                            </tr>
                                            <tr>
                                                <td>State</td>
                                                <td width="5px"></td>
                                                <td><? echo $state; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Country</td>
                                                <td width="5px"></td>
                                                <td><? echo $country; ?></td>
                                            </tr>
                                            <tr>
                                                <td> Postal Code</td>
                                                <td width="5px"></td>
                                                <td><? echo $postalCode; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Phone</td>
                                                <td width="5px"></td>
                                                <td><? echo $phone; ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">

                                                    <form name="preeditprofile" action="UserCtrl.php" method="post">
                                                        <input type="hidden" name="action" value="preeditprofile">
                                                        <a href="javascript: preeditprofile()">Edit Profile</a>
                                                        <script type="text/javascript">
                                                            function preeditprofile()
                                                            {
                                                                document.preeditprofile.submit();
                                                            }
                                                        </script>
                                                    </form>
                                                    <form name="preparechangepicture" action="UserCtrl.php" method="post">
                                                        <input type="hidden" name="action" value="preparechangepicture">
                                                        <input type="hidden" name="id" value="<? echo $sponsorID; ?>"/>
                                                        <a href="javascript: preparechangepicture()">Change Profile Picture</a>
                                                        <script type="text/javascript">
                                                            function preparechangepicture()
                                                            {
                                                                document.preparechangepicture.submit();
                                                            }
                                                        </script>
                                                    </form>
                                                </td>


                                            </tr>

                                        </table>
                                        <hr>
                                        <?php
                                        $userpost = unserialize($_SESSION['userpost']);

                                        if (count($userpost) > 0) {

                                            //for ($i = count($userpost) -1; $i > 0; $i--) {
                                            $i = count($userpost);
                                            while ($i > 0) {



                                                $temp = $userpost[$i - 1];
                                                // echo $temp[0]."|". $temp[1]."|". $temp[2]."|". $temp[3]."|". $temp[4]."<br/>";
                                                $id = $temp[0];
                                                $photo = $temp[2];
                                                $content = $temp[3];
                                                $time = $temp[4];
                                                ?>
                                                <table style=" width: 100%;">
                                                    <tr>
                                                        <td><div style="float:left"><a ><?php echo $name; ?></a></div>

                                                            <form   onsubmit="return deletepost();" action="UserCtrl.php" method="post">
                                                                <input type="hidden" name="userid" value="<? echo $_SESSION['usernameU']; ?>"/>
                                                                <input type="hidden" name="postid" value="<? echo $id; ?>"/>
                                                                <input type="hidden" name="action" value="deletepost"/>
                                                                <input style="float:right" type="submit" value="x"/>
                                                                <!--<a style="float:right" href="javascript: deletepost()">x</a>-->

                                                            </form>

                                                        </td>
                                                    </tr>
                                                    <? if ($photo != null || $photo != '') { ?>
                                                        <tr>
                                                            <td valign="middle" style="width:300px">
                                                                <img style=" max-width:70%;max-height: 300px;"  src='../Database/Images/Sponsor/<?php echo $photo; ?>'/>
                                                            </td>
                                                        </tr>
                                                    <? } ?>
                                                    <tr>
                                                        <td  valign="middle" >
                                                            <?php echo $content; ?>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td align="right"> <font size="2"><?php echo $time; ?></font>
                                                            <hr>
                                                        </td>
                                                    </tr>


                                                </table>
                                                <br/>
                                                <?php
                                                $i--;
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>

                                <div class="row-fluid">
                                    <div class="userProfileBot">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="span1">

                        <div class="row-fluid">
                            <form>
                                <input type="button" class="span12 pickMeButton" id="pickme" name="pickme" data-toggle="modal" href="#pickMeModal">
                            </form>
                        </div>

                        <div class="row-fluid">
                            <form>
                                <input type="button" class="span12 recommendedButton" id="recommended" name="recommended" data-toggle="modal" href="#Recomended">
                            </form>
                        </div>

                        <div class="row-fluid">
                            <form>
                                <input type="button" class="span12 emergencyButton" id="emergency" name="emergency" data-toggle="modal" href="#Emergency">
                            </form>
                        </div>

                    </div>
                </div>
            </div>



            <div class="Footer margin-top">
                <!-- footer div -->
                <div id="footer" style="float:right; margin:5px">
                    Copyright © Crying Onion 2013
                </div>
            </div>




            <!-- SCRIPT !!!  -->

            <script src="../js/jquery.js"></script>  
            <script src="../js/bootstrap-modal.js"></script>  
            <script src="../js/js-script.js"></script>
            <script src="../js/bootstrap.min.js"></script>
























            <hr>




            </body>
            </html>
