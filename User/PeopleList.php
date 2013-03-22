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

                                                                                                        <!--<input type="submit" value="View Profile"/>-->



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
