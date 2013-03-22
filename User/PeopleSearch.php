<?php
session_start();
$userdata = unserialize($_SESSION['userdata']);
?>

<!DOCTYPE HTML>

<html>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/mainMenuCss.css">
        <link rel="stylesheet" type="text/css" href="../css/FoundationProfile.css">
        <link rel="stylesheet" type="text/css" href="../css/UserProfile.css">

        <title>Search Menu</title>

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
                                            <p class="myFont">Search People</p>
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

                                        </div>

                                    </div>
                                </div>



                                <div class="row-fluid">
                                    <div class="searchFeedBot">
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



