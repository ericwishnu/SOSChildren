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
<<<<<<< HEAD
            
            <?php include 'Footer.php' ?>
            <?php include 'Script.php' ?>
=======
        </div>

        <!-- Modal for Widget button -->

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

        <!-- Recommended Modal Division -->

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
        <script src="../js/js-script.js"></script>
        <script src="../js/bootstrap.min.js"></script>
>>>>>>> mainpage and userpage commit


    </body>
</html>
