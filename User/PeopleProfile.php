<?
session_start();
include 'User.php';
include 'PostData.php';
$userdata = unserialize($_SESSION['userdata']);
$userinfo = unserialize($_SESSION['peopledataobj']);
$peopleID = $userinfo->getSponsorID();
$photo = $userinfo->getPhoto();
$email = $userinfo->getEmail();
$peoplename = $userinfo->getName();

$userdata = unserialize($_SESSION['userdata']);
$address = $userinfo->getAddress();
$city = $userinfo->getCity();
$state = $userinfo->getState();
$country = $userinfo->getCountry();
$postalCode = $userinfo->getPostalCode();
$phone = $userinfo->getPhone();
$relationship = $_SESSION['relationship'];
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
        <?php include 'UserHeader.php' ?>
        <?php include 'Logo.php' ?>
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
                                        <h2><? echo $peoplename; ?></h2>
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
                                                <td>Email</td>
                                                <td> : &nbsp; </td>
                                                <td><? echo $email; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Name</td>
                                                <td> : &nbsp; </td>
                                                <td><? echo $peoplename; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Address</td>
                                                <td> : &nbsp; </td>
                                                <td><? echo $address; ?></td>
                                            <tr>
                                                <td>City</td>
                                                <td> : &nbsp; </td>
                                                <td><? echo $city; ?></td>
                                            </tr>
                                            <tr>
                                                <td>State</td>
                                                <td> : &nbsp; </td>
                                                <td><? echo $state; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Country</td>
                                                <td> : &nbsp; </td>
                                                <td><? echo $country; ?></td>
                                            </tr>
                                            <tr>
                                                <td> Postal Code</td>
                                                <td> : &nbsp; </td>
                                                <td><? echo $postalCode; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Phone</td>
                                                <td> : &nbsp; </td>
                                                <td><? echo $phone; ?></td>
                                            </tr>
                                            <tr>
                                                <td valign="top">Relationship</td>
                                                <td valign="top"> : &nbsp; </td>
                                                <td><? if ($relationship == null) { ?>
                                                        <form name="addneighbour" action="PeopleCtrl.php" method="post">
                                                            <input type="hidden" name="action" value="addneighbour">
                                                            <input type="hidden" name="peopleID" value="<? echo $peopleID ?>">
                                                            <a href="javascript: addneighbour()">Add Neighbor</a>
                                                            <script type="text/javascript">
                                                                function addneighbour()
                                                                {
                                                                    document.addneighbour.submit();
                                                                }
                                                            </script>
                                                        </form>
                                                    <? } else if ($relationship == "Pending") { ?>
                                                        <form name="cancelrequest" action="PeopleCtrl.php" method="post">
                                                            <input type="hidden" name="action" value="removeneighbour">
                                                            <input type="hidden" name="peopleID" value="<? echo $peopleID ?>">
                                                            <a href="javascript: cancelrequest()">Cancel Request</a>
                                                            <script type="text/javascript">
                                                                function cancelrequest()
                                                                {
                                                                    document.cancelrequest.submit();
                                                                }
                                                            </script>
                                                        </form>
                                                    <? } else { ?>

                                                        <form name="editrelationship" action="PeopleCtrl.php" method="post">
                                                            <input type="hidden" name="action" value="editrelationship">
                                                            <input type="hidden" name="peopleID" value="<? echo $peopleID ?>">
                                                            <select name="relationship">
                                                                <?
                                                                $val1 = "";
                                                                $val2 = "";
                                                                $val3 = "";
                                                                $val4 = "";

                                                                if ($relationship == "Neighbour") {
                                                                    $val1 = "selected";
                                                                } else if ($relationship == "Close Neighbour") {
                                                                    $val2 = "selected";
                                                                } else if ($relationship == "Family House") {
                                                                    $val3 = "selected";
                                                                } else if ($relationship == "Office Room") {
                                                                    $val4 = "selected";
                                                                }
                                                                ?>

                                                                <option value="Neighbour" <? echo $val1 ?>>Regular Neighbor</option>
                                                                <option value="Close Neighbour" <? echo $val2 ?>>Close Neighbor</option>
                                                                <option value="Family House" <? echo $val3 ?>>Family House</option>
                                                                <option value="Office Room" <? echo $val4 ?>>Office Room</option>
                                                            </select>
                                                            <input type="submit" value="Save">
                                                        </form>

                                                        <form name="removeneighbour" action="PeopleCtrl.php" method="post">
                                                            <input type="hidden" name="action" value="removeneighbour">
                                                            <input type="hidden" name="peopleID" value="<? echo $peopleID; ?>">
                                                            <a href="javascript: removeneighbour()">Delete Neighbor</a>
                                                            <script type="text/javascript">
                                                                function removeneighbour()
                                                                {
                                                                    document.removeneighbour.submit();
                                                                }
                                                            </script>
                                                        </form>

                                                    <? } ?>
                                                </td>
                                            </tr>
                                        </table>
                                        <hr>
                                        <?php
                                        $userpostlist = unserialize($_SESSION['postlistdataobj']);

                                        if (count($userpostlist) > 0) {

                                            //for ($i = count($userpost) -1; $i > 0; $i--) {
                                            $i = count($userpostlist);
                                            while ($i > 0) {
                                                $userpost = $userpostlist[$i - 1];
                                                $postName = $userpost->getName();
                                                $postPhoto = $userpost->getPhoto();
                                                $postContent = $userpost->getPostContent();
                                                $postDateTime = $userpost->getDateTime();
                                                $postUserType = $userpost->getUserType();
                                                ?>
                                                <table style=" width: 100%;">
                                                    <tr>
                                                        <td><div style="float:left"><a ><?php echo $postName; ?></a></div>

                                                            <form   onsubmit="return deletepost();" action="UserCtrl.php" method="post">
                                                                <input type="hidden" name="userid" value="<? echo $_SESSION['usernameU']; ?>"/>
                                                                <input type="hidden" name="postid" value="<? echo $id; ?>"/>
                                                                <input type="hidden" name="action" value="deletepost"/>
                                                                <input style="float:right" type="submit" value="x"/>
                                                                <!--<a style="float:right" href="javascript: deletepost()">x</a>-->

                                                            </form>

                                                        </td>
                                                    </tr>
                                                    <? if ($postPhoto != null || $postPhoto != '') { ?>
                                                        <tr>
                                                            <td valign="middle" style="width:300px">
                                                                <img style=" max-width:70%;max-height: 300px;"  src='../Database/Images/Sponsor/<?php echo $postPhoto; ?>'/>
                                                            </td>
                                                        </tr>
                                                    <? } ?>
                                                    <tr>
                                                        <td  valign="middle" >
                                                            <?php echo $postContent; ?>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td align="right"> <font size="2"><?php echo $postDateTime; ?></font>
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
                    <?php include 'UserModal.php' ?>
                </div>
            </div>

            <?php include 'Footer.php' ?>
            <?php include 'Script.php' ?>
    </body>
</html>
