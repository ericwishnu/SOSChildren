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


        <div class="Header">
            <!-- Header class -->
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

                        <div class="row-fluid">

                            <form name="mainpage" action="UserCtrl.php" method="post"/>
                            <input type="hidden" name="sponsorID" value="<?php echo $_SESSION['usernameU']; ?>"/>
                            <input type="hidden" name="action" value="mainpage"/>
                            <input type="submit" class="homeButton span12" id="home" name="name" value=""/>
                            </form>
                        </div>

                        <div class="row-fluid">
                          <form name="listkids" action="KidsCtrl.php" method="post">
                                <input type="hidden" name="action" value="listkids">
                                <input type="submit" class="exploreButton span12" id="explore" name="explore" value=""/>
                            </form>
                        </div>

                        <div class="row-fluid">
                            <form action="NotifMenu.html" method="post">
                                <input type="hidden" name="action" value="notif"/>
                                <input type="submit" class="notificationButton span12" id="notification" name="notification" value=""/>
                            </form>
                        </div>

                        <div class="row-fluid">
                            <form action="CoinsMenu.html" method="post">
                                <input type="hidden" name="action" value="coins"/>
                                <input type="submit" class="coinButton span12" id="coin" name="coin" value=""/>
                            </form>
                        </div>

                        <div class="row-fluid" >
                            <form action="#" method="post">
                                <input type="hidden" name="action" value="search"/>
                                <input type="submit" class="searchButton span12" id="search" name="search" value=""/>
                            </form>
                        </div>

                    </div>


                    <div class="span9">

                        <?php include 'PostStatus.php'; ?>


                        <div class="row-fluid margin-top">
                            <!-- Main Menu Class -->
                            <div class="span12">

                                <div class="row-fluid">
                                    <div class="kidsFeedTop">

                                    </div>
                                </div>

                                <div class="row-fluid">
                                    <div class="kidsFeedMiddle">
                                       
                                        <br/>
                                        <div class="row-fluid">
                                                <?php
                                                $kidsList = unserialize($_SESSION['kidslistdataobj']);

                                                if (count($kidsList) > 0) {
                                                    ?>
<!--                                                <table style="border:1px solid">
                                                    <tr bgcolor="#c0c0c0">
                                                        <td height="30px" style="min-width: 90px" valign="middle" align="center">Kids ID</td>                
                                                        <td height="30px" style="min-width: 90px" valign="middle" align="center">Name</td>
                                                        <td height="30px" style="min-width: 90px" valign="middle" align="center">Photo</td>
                                                        <td height="30px" style="min-width: 90px" valign="middle" align="center">DOB</td>
                                                        <td height="30px" style="min-width: 90px" valign="middle" align="center">Background</td>
                                                        <td height="30px" style="min-width: 90px" valign="middle" align="center">Region</td>
                                                        <td height="30px" style="min-width: 90px" valign="middle" align="center">Origin</td>
                                                        <td height="30px" style="min-width: 90px" valign="middle" align="center">Aspiration</td>
                                                        <td height="30px" style="min-width: 90px" valign="middle" align="center">Health</td>
                                                        <td height="30px" style="min-width: 90px" valign="middle" align="center">Education</td>
                                                        <td height="30px" style="min-width: 90px" valign="middle" align="center">Nutrition</td>
                                                        <td height="30px" style="min-width: 90px" valign="middle" align="center">Foundation ID</td>
                                                        <td height="30px" style="min-width: 90px" valign="middle" align="center"></td>

                                                    </tr>-->

                                                    <?
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
//           $heatlh = $temp->getHealth();
//           $education = $temp->getEducation();
//           $nutrition = $temp->getNutrition();
                                                        // $foundationID = $temp->getFoundationID();
                                                        // if($aspiration==""|$aspiration==null)$aspiration="-";
                                                        ?>
                                         <div class="thumbnail">
                                                        <form name="kidsprofile<?php echo $i?>" action="KidsCtrl.php" method="POST">
                                                            <input type="hidden" name="kidsSelectedID" value="<?php echo $kidsID; ?>"/>
                                                            <input type="hidden" name="action" value="kidsprofile"/>
                                                            
                                                               
                                                           
                                                                <div >
                                                                    <a href="javascript: kidsprofile<?php echo$i?>()">
                                                                        <img class="kidsphoto" src="../Database/Images/Kids/<? echo $photo; ?>" />
                                                                    </a>
                                                                </div>
                                                                <div class="kidsname"><? echo $name; ?></div>
                                                                <div class="kidsaspiration">Aspiration: <? echo $aspiration; ?></div>
                                                                
                                                                <script type="text/javascript">
                                                                    function kidsprofile<?php echo$i?>()
                                                                    {
                                                                        document.kidsprofile<?php echo$i?>.submit();
                                                                    }
                                                                </script>

                                                                <!--<input type="submit" value="View Profile"/>-->



                                                                </form>
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
                                </div>

                                <div class="row-fluid">
                                    <div class="kidsFeedBot">
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

























            <hr>


            </body>
            </html>
