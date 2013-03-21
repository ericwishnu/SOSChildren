<?
session_start();
include 'Kids.php';
$userdata = unserialize($_SESSION['userdata']);

$kidsData = unserialize($_SESSION['kidsdataobj']);
$kidsID = $kidsData->getKidsID();
$name = $kidsData->getName();
$photo = $kidsData->getPhoto();
$DOB = $kidsData->getDOB();
$background = $kidsData->getBackground();
$region = $kidsData->getRegion();
$origin = $kidsData->getOrigin();
$aspiration = $kidsData->getAspiration();
$health = $kidsData->getHealth();
$education = $kidsData->getEducation();
$foundationID = $kidsData->getFoundationID();
$kidsIDinFoundation = $kidsData->getKidsIDinFoundation();
$age=$kidsData->getAge();
$foundation = "";
$foundationname = unserialize($_SESSION['foundationname']);
for ($i = 0; $i < count($foundationname); $i++) {
    $temp = $foundationname[$i];
    if ($foundationID == $temp[0]) {

        $foundation = $temp[1];
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/mainMenuCss.css">
    <link rel="stylesheet" type="text/css" href="../css/kidsProfile.css">
    <title>Kids Profile</title>
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
                    <div class="kidsProfilePicture span2">
                        <img width="100%" style="border-radius:10px" src="../Database/Images/Kids/<? echo $photo ?>" alt="<? $kidsData->getName() ?>"/>

                    </div>

                    <div class="kidsProfilePost span9">
                        <div class="row-fluid">

                            <div class="span11 offset1">
                                <h1><? echo $name ?></h1>

                                <form name="foundation" action="FoundationCtrl.php" method="post">
                                    <input type="hidden" name="action" value="foundationprofile"/>
                                    <input type="hidden" name="foundationSelectedID" value="<?php echo $foundationID?>"/>

                                </form>
                                <a href="javascript: foundation()"><? echo $foundation ?></a> 
                                <script>
                                function foundation(){
                                    document.foundation.submit();
                                }
                                </script>
                                <?php echo " - " .$kidsData->getRegion() ?><br/>
                                Aspiration <? echo $aspiration ?>
                            </div>  
                        </div>
                    </div>

                </div>

                <div class="row-fluid margin-top">
                    <!-- Main Menu Class -->
                    <div class="span12">

                        <div class="row-fluid">
                            <div class="kidsFeedTop">
                                <div class="myFont">
                                    <p class="myFont"> Information </p>
                                </div>
                            </div>
                        </div>

                        <div class="row-fluid">
                            <div class="kidsFeedMiddle" >
                                <table>
       <!--                                      <tr>
                                                <td>Foundation ID</td>
                                                <td>:</td>
                                                <td><? echo $kidsData->getFoundationID() ?></td>
                                            </tr> -->

                                            <tr>
                                                <td><img src="../img/kidsinfo/kidsicon_dob.png" alt="Smiley face" height="42" width="42"> </td>
                                                <td> &nbsp; <? echo $kidsData->getDOB() ?></td>
                                            </tr>
                                            
                                            <tr>
                                                <td><img src="../img/kidsinfo/kidsicon_age.png" alt="Smiley face" height="42" width="42"></td>
                                                <td> &nbsp; <?php echo $age?> years old</td>
                                            </tr>

                                            <tr>
                                             <td><img src="../img/kidsinfo/kidsicon_origin.png" alt="Smiley face" height="42" width="42"></td>
                                             <td> &nbsp; <? echo $kidsData->getOrigin() ?></td>
                                         </tr>

                                         <tr>
                                            <td><img src="../img/kidsinfo/kidsicon_parentsjob.png" alt="Smiley face" height="42" width="42"></td>
                                            <td valign="center"> &nbsp; <? echo $kidsData->getBackground() ?></td>
                                        </tr>
                                        <tr>

                                           <td><img src="../img/kidsinfo/kidsicon_needs.png" alt="Smiley face" height="42" width="42"></td>
                                           <td valign="top">
                                            <?
                                            if ($kidsData->getHealth() == '1') {
                                                ?>  &nbsp; 
                                                Health <br>
                                                <?
                                            }
                                            if ($kidsData->getEducation() == '1') {
                                                ?>  &nbsp; 
                                                Education <br>
                                                <?
                                            }
                                            if ($kidsData->getNutrition() == '1') {
                                                ?>  &nbsp; 
                                                Nutrition
                                                <?
                                            }
                                            ?> 
                                        </td>
                                    </tr>
                                </table>               



                                <form action='KidsCtrl.php' method="post">
                                    <input type="hidden" name="action" value="prepareFosterKids">

                                    <table class="margin-top"><!-- TABLE AFTER FIRST TABLE -->

                                        <tr>
                                            <td valign="left"  halign="bottom" frame="box" rowspan="7" width="200px">

                                                <?
                                                if (isset($_SESSION['usernameU']) && $_SESSION['usernameU'] != "") {
                                                    if (isset($_SESSION['checkFoster']) && $_SESSION['checkFoster'] == "false") {
                                                        ?>
                                                        <input type="submit" value="Foster Me" class="myFont-button">

                                                        <?
                                                    }
                                                }
                                                ?>
                                                <input type="hidden" name="kidsSelectedID" value="<? echo $kidsData->getKidsID() ?>">

                                                <input type="hidden" name="kidsID" value="<? echo $kidsData->getKidsID() ?>">
                                            </td>
                                        </tr>
                                    </table><!-- END OF TABLE AFTER FIRST TABLE -->
                                </form>


                                <div class="row">
                                    <div class="accordion margin-top" id="accordion2">
                                        <div class="accordion-group">
                                            <div class="accordion-heading">
                                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                                                    Kid's Journal
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="collapseOne" class="accordion-body collapse">
                                        <div class="accordion-inner">
                                            Coming Soon . . .
<!--                                                    "Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                                                    nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                                                    reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla 
                                                    pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa 
                                                    qui officia deserunt mollit anim id est laborum."-->
                                                </div>
                                            </div>
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
            <!-- SCRIPT !!!  -->

            <script src="../js/jquery.js"></script>  
            <script src="../js/bootstrap-modal.js"></script>  
            <script src="../js/js-script.js"></script>
            <script src="../js/bootstrap.min.js"></script>
        </body>
        </html>
