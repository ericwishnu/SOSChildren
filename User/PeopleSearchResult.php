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
    <link rel="stylesheet" type="text/css" href="../css/FoundationProfile.css">
    <link rel="stylesheet" type="text/css" href="../css/UserProfile.css">
    <title>Search Result</title>

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

                    <div class="row-fluid">
                        <!-- Main Menu Class -->
                        <div class="span12">

                            <div class="row-fluid">
                                <div class="searchFeedTop">
                                    <div class="myFont">
                                        <? if ($_SESSION['searchfoundationdataobj'] == null && $_SESSION['searchpeopledataobj'] == null) {
                                            ?>
                                            <p class="myFont">Search  <?php if (isset($_GET['key'])) echo "\"" . $_GET['key'] . "\"" ?> Result not found</p>
                                            <? } else {
                                                ?>

                                                <p class="myFont">Search  <?php if (isset($_GET['key'])) echo "\"" . $_GET['key'] . "\"" ?> Result</p>
                                                <? } ?>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row-fluid">
                                        <div class="searchFeedMiddle">
                                            <div class="row-fluid">
                                                <form class="form-search" action="PeopleCtrl.php" method="post">
                                                    <div class="span5 margin-rightHeader">
                                                        <input type="text" name="keyword" class="input-large search-query">
                                                        <input type="hidden" name="action" value="searchpeople">
                                                    </div>
                                                    <div class="span2">
                                                        <div class="control-group ">  
                                                            <div class="controls">  
                                                                <select name="searchby" id="select">
                                                                    <option value="Name" selected>Name</option>
                                                                    <option value="Username">Username</option>
                                                                    <option value="City">City</option>
                                                                    <option value="Country">Country</option>
                                                                </select>
                                                            </div>   
                                                        </div>

                                                    </div>
                                                    <div class="span3 marginSearchLeft">
                                                        <input type="submit" value="Search" class="btn">
                                                    </div>
                                                </form>
                                                <?php
                                                $peopleList = unserialize($_SESSION['searchpeopledataobj']);

                                                if (count($peopleList) > 0 || $_SESSION['searchpeopleresult'] = "1") {
                                                    ?>


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
                                                    <div style="float:left" >
                                                        <div>
                                                            <img  style="width:150px;margin:15px; height:150px; float:left" src="<? echo "../Database/Images/Sponsor/" . $photo; ?>" />
                                                            <form name="sponsorprofile<?php echo md5($i) ?>" action="PeopleCtrl.php" method="post">
                                                                <input type="hidden" name="action" value="seepeopleprofile">
                                                                <input type="hidden" name="peopleSelectedID" value="<? echo $peopleID ?>">

                                                            </form>
                                                        </div>

                                                        <div  >
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
                                                    </div>
                                                    <div style="clear:both">

                                                    </div>
                                                    <?
                                                }
                                                ?>
                                            </table>
                                            <?
                                        }
                                        else if ($_SESSION['searchresult'] == "0") {
                                            echo 'Not Avaiable';
                                        } else {
                                            echo 'Not Avaiable';
                                        }
                                        ?>
                                    </div>
                                </div>



                                <div class="row-fluid">
                                    <div class="searchFeedBot">
                                    </div>
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
