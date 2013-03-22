<?php
session_start();
$userdata = unserialize($_SESSION['userdata']);
include 'User.php';
?>
<!DOCTYPE HTML>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/mainMenuCss.css">
        <link rel="stylesheet" type="text/css" href="../css/coinMenu.css">
        <title>Coins.. Coins Everywhere</title>
    </head>

    <body class="Background">

        <?php include 'UserHeader.php' ?>

        <?php include 'Logo.php' ?>

        <div class="row">

            <div class="container">
                <div class="row-fluid">

                    <div class="span2 paddingLeft">

                        <?php include 'UserNavigation.php'; ?>

                    </div>



                    <div class="span9">

                        <!-- USER POST DIVISION -->
                        <?php include 'PostStatus.php'; ?>

                        <div class="row-fluid margin-top">
                            <!-- Main Menu Class -->
                            <div class="span12">

                                <div class="row-fluid">
                                    <div class="coinsFeedTop">
                                        <div class="myFont">
                                            <p class="myFont"> Coins </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row-fluid">
                                    <div class="coinsFeedMiddle">
                                        <div class="row">
                                            <div class="row">
                                                <div class="span4 offset1 coinHeader">
                                                    <div class="span4 underlogo"></div>
                                                </div>
                                                <div class="span4 offset2">
                                                    <form action="UserCtrl.php" method="post">
                                                        <input type="hidden" name="action" value="coinpage"/>
                                                        <input type="submit" class="span12 checkCoin" value="">
                                                    </form>
                                                    <div class="row">
                                                        <div class="textAmount span12 offset1"></div> 
                                                    </div>
                                                    <div class="row input-prepend">
                                                        <form>
                                                            <input type="text" value="<? echo $_SESSION['mycoinamout']; ?>" class="offset4 input-small" readonly value=""><span class="add-on">Coins</span>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>	
                                        </div>

                                        <div class="row">
                                            <div class="span4 offset1">
                                                <div class="row">
                                                    <div class="textBuy span10" value="">
                                                    </div>
                                                </div>

                                                <div class="row span12 input-prepend">
                                                    <form class="margin-top">
                                                        <input type="text" class="input-small" value="">
                                                        <span class="add-on">Coins</span>
                                                    </form>

                                                </div>
                                                <div class="row">
                                                    <form>
                                                        <input type="submit" class="buyCoin span10" value="">
                                                    </form>
                                                </div>
                                            </div>

                                            <div class="offset1 span5">
                                                <div class="bigCoin"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row-fluid">
                                        <div class="coinsFeedBot">
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