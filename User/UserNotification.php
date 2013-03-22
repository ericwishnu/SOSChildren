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
        <title>Here's Some Heads Up</title>

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
                                            ?>




                                            <table style="border:1px solid">
                                                <tr bgcolor="#c0c0c0">
                                                    <td height="30px" style="min-width: 90px" valign="middle" align="center">Username</td>
                                                    <!--<td height="30px" style="min-width: 90px" valign="middle" align="center">Password</td>-->
                                                    <td height="30px" style="min-width: 90px" valign="middle" align="center">Photo</td>
                                                    <td height="30px" style="min-width: 90px" valign="middle" align="center">e-mail</td>
                                                    <td height="30px" style="min-width: 90px" valign="middle" align="center">Name</td>
                                                    <td height="30px" style="min-width: 90px" valign="middle" align="center">Address</td>
                                                    <td height="30px" style="min-width: 90px" valign="middle" align="center">City</td>
                                                    <td height="30px" style="min-width: 90px" valign="middle" align="center">State</td>
                                                    <td height="30px" style="min-width: 90px" valign="middle" align="center">Country</td>
                                                    <td height="30px" style="min-width: 90px" valign="middle" align="center">Postal Code</td>
                                                    <td height="30px" style="min-width: 90px" valign="middle" align="center">Phone</td>
                                                    <td height="30px" style="min-width: 90px" valign="middle" align="center">Coins</td>
                                                    <td height="30px" style="min-width: 90px" valign="middle" align="center" colspan="2"></td>

                                                </tr>

                                                <?
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

                                                    <tr>
                                                        <td><? echo $peopleID; ?></td>                    
                                                        <!--<td><!--?echo $password;?></td>--> 
                                                        <td align="center"><img src="<? echo "../Database/Images/Sponsor/" . $photo; ?>" width="30"height="30"/></td> 
                                                        <td><? echo $email; ?></td> 
                                                        <td><? echo $name; ?></td> 
                                                        <td><? echo $address; ?></td> 
                                                        <td><? echo $city; ?></td> 
                                                        <td><? echo $state; ?></td> 
                                                        <td align="center"><? echo $country; ?></td> 
                                                        <td align="center"><? echo $postalCode; ?></td> 
                                                        <td align="right"><? echo $phone; ?></td> 
                                                        <td align="center"><? echo $coins; ?></td>
                                                        <td align="center">
                                                            <form action="PeopleCtrl.php" method="post">
                                                                <input type="hidden" name="action" value="seepeopleprofile">
                                                                <input type="hidden" name="peopleSelectedID" value="<? echo $peopleID ?>">
                                                                <input type="submit" value="View Profile">
                                                            </form>
                                                        </td>
                                                        <td align="center">
                                                            <form action="PeopleCtrl.php" method="post">
                                                                <input type="hidden" name="action" value="approveneighbour">
                                                                <input type="hidden" name="peopleID" value="<? echo $peopleID ?>">
                                                                <input type="submit" value="Approve">
                                                            </form>
                                                            <form action="PeopleCtrl.php" method="post">
                                                                <input type="hidden" name="action" value="removeneighbour">
                                                                <input type="hidden" name="peopleID" value="<? echo $peopleID ?>">
                                                                <input type="submit" value="Decline">
                                                            </form>
                                                        </td>
                                                    </tr>

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

                                <div class="row-fluid">
                                    <div class="notifFeedBot">
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

            <div class="row margin-top">
            </div>


            <div class="Footer">
                <div id="footer" style="float:right; margin:5px">
                    Copyright © Crying Onion 2013
                </div>

            </div>



            <!-- Modal for Widget button 
            -->

            <!-- Pick Me Modal Division -->

            <div id="pickMeModal" class="modal hide fade in" style="display: none; ">  
                <div class="modal-header modalPink modal-radius">  
                    <a class="close" data-dismiss="modal">×</a>  
                    <h3>This is a Pick Me Modal Example</h3>  
                </div>  
                <div class="modal-body">  
                    <h4>Text in a modal</h4>  
                    <p>You can add some text here.</p>                
                </div>  
                <div class="modal-footer modalPink">  
                    <a href="#" class="btn btn-success">Call to action</a>  
                    <a href="#" class="btn" data-dismiss="modal">Close</a>  
                </div>  
            </div>  

            <!-- 
                    Recommended Modal Division -->

            <div id="Recomended" class="modal hide fade in" style="display: none; ">  
                <div class="modal-header modalPink modal-radius">  
                    <a class="close" data-dismiss="modal">×</a>  
                    <h3>Recommended</h3>  
                </div>  
                <div class="modal-body">  
                    <h4>Text in a modal</h4>  
                    <p>You can add some text here.</p>                
                </div>  
                <div class="modal-footer modalPink">  
                    <a href="#" class="btn btn-success">Call to action</a>  
                    <a href="#" class="btn" data-dismiss="modal">Close</a>  
                </div>  
            </div>  


            <!-- Emergency Button -->

            <div id="Emergency" class="modal hide fade in" style="display: none;">

                <div class="modal-header modalPink modal-radius">  
                    <a class="close" data-dismiss="modal">×</a>  
                    <h2>Emergency</h2>  
                </div>  
                <div class="modal-body">  
                    <h4>Text in a modal</h4>  
                    <p>Add some Text Here</p>
                </div>  
                <div class="modal-footer modalPink">  
                    <a href="#" class="btn btn-success">Call to action</a>  
                    <a href="#" class="btn" data-dismiss="modal">Close</a>  
                </div>  

            </div>  

            <!-- SCRIPT !!!  -->
            <script src="../js/jquery.js"></script>  
            <script src="../js/bootstrap-modal.js"></script>  
            <script src="../js/js-script.js"></script>
            <script src="../js/bootstrap.min.js"></script>

    </body>

</html>