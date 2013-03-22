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
        <?php include 'UserHeader.php' ?>
        <?php include 'Logo.php' ?>

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

                    <?php include 'UserModal.php' ?>

                </div>
            </div>
            <?php include 'Footer.php' ?>
            <?php include 'Script.php' ?>
    </body>
</html>
