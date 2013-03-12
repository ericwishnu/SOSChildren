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
        <title>Hello User</title>

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



            <div class="Footer margin-top ">
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

<?
//session_start();
?>
<!--
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>SOS Children</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/mainMenuCss.css">
    </head>
    <body> 
<?
//include 'UserHeader.php';
?>
        <hr>
        <br>


<?
//include 'PostStatus.php';
//include 'PeopleSearch.php';
?><br>
        <form name="listneighbours" action="PeopleCtrl.php" method="post">
            <input type="hidden" name="action" value="listneighbours">
            <a href="javascript: listneighbours()">List Neighbors</a>
            <script type="text/javascript">
                function listneighbours()
                {
                    document.listneighbours.submit();
                }
            </script>
        </form>
        <form name="neighbourrequest" action="PeopleCtrl.php" method="post">
            <input type="hidden" name="action" value="neighbourrequest">
            <a href="javascript: neighbourrequest()">List Neighbors Request</a>
            <script type="text/javascript">
                function neighbourrequest()
                {
                    document.neighbourrequest.submit();
                }
            </script>
        </form>

<? // include 'NewsFeed.php' ?>

    </body>
</html>-->
