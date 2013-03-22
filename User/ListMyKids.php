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

        <div class="Header">
            <!-- Header class -->
            <div class="row">

                <div class="offset10 headerContain">
                    <div class="row-fluid">
                        <div class="span6">
                            <?php include 'GlobalSearch.php' ?>
                        </div>
                        <div class="span3">
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
            <script src="../js/bootstrap.min.js"></script>






    </body>
</html>
