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
        <title>Hello <?php echo $userdata[1] ?></title>
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

                        <?php include 'PostStatus.php'; ?>

                        <div class="row-fluid margin-top">
                            <!-- Main Menu Class -->
                            <div class="span12">

                                <div class="row-fluid">
                                    <div class="newsFeedTop">
                                        <div class="myFont">
                                            <p class="myFont"> News Feed </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row-fluid">
                                    <div class="newsFeedMiddle">
                                        <?php include 'NewsFeed.php'; ?>

                                    </div>
                                </div>

                                <div class="row-fluid">
                                    <div class="newsFeedBot">
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
