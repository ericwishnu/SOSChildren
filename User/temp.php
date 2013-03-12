
<?php session_start();?>
<!DOCTYPE HTML>

<html>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/mainMenuCss.css">
        <title>Hello User</title>

    </head>

    <body class="Background">

        <div class="Header">
            <!-- Header class -->
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

                        <div class="row-fluid">

                            <form name="mainpage" action="UserCtrl.php" method="post"/>
                            <input type="hidden" name="sponsorID" value="<?php echo $_SESSION['usernameU']; ?>"/>
                            <input type="hidden" name="action" value="mainpage"/>
                            <input type="submit" class="homeButton span12" id="home" name="name" value=""/>
                            </form>
                        </div>

                        <div class="row-fluid">

                           

                            <form   name="listkids" action="KidsCtrl.php" method="post">
                                <input type="hidden" name="action" value="listkids">
                                <input type="submit" class="exploreButton span12" id="explore" name="explore" value=""/>

                            </form>
                        </div>

                        <div class="row-fluid">
                            <form action="NotifMenu.html" method="post">
                                <input type="hidden" name="action" value="notif"/>
                                <input type="submit" class="notificationButton span12" id="notification" name="notification" value=""/>
                            </form>
                        </div>

                        <div class="row-fluid">
                            <form action="CoinsMenu.html" method="post">
                                <input type="hidden" name="action" value="coins"/>
                                <input type="submit" class="coinButton span12" id="coin" name="coin" value=""/>
                            </form>
                        </div>

                        <div class="row-fluid" >
                            <form action="#" method="post">
                                <input type="hidden" name="action" value="search"/>
                                <input type="submit" class="searchButton span12" id="search" name="search" value=""/>
                            </form>
                        </div>

                    </div>


                    <div class="span9">

                        <!-- USER POST DIVISION -->
                        <div class="row-fluid">
                            <div class="userPicture span2">
                            </div>

                            <div class="userPost span9">
                                <div class="row-fluid"> 	
                                    <div class="span9 postArea">

                                        <form id="form1" action="UserCtrl.php" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="action"  value="addpost"/>
                                            <input type="hidden" name="id"  value="<?php echo $_SESSION['usernameU']; ?>"/>
    
                                            <textarea class="textArea" name="content"></textarea>
                                            <div id="uploadbtn" onclick="getFile()"><i class="icon-picture"></i>&nbsp;Upload Photo</div>
                                            <div style='height: 0px; width: 0px;overflow:hidden;'>
                                                <input id="upfile" type="file" name="photo" value="upload" onchange="sub(this)"/>
                                            </div>


                                    </div>

                                    <!-- Area for inputing a post  -->
                                    <div class="span2">

                                     
                                        <input type="submit" class="postButton span10" id="post" name="post" value=""/>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row-fluid margin-top">
                            <!-- Main Menu Class -->
                            <div class="span12">

                                <div class="row-fluid">
                                    <div class="newsFeedTop">

                                    </div>
                                </div>

                                <div class="row-fluid">
                                    <div class="newsFeedMiddle">
                                        <?php include 'PostData.php';
                                        
                                        
$postlist = unserialize($_SESSION['newsfeeddataobj']);

if (count($postlist) > 0) {

for ($i = 0;
$i < count($postlist);
$i++) {

$temp = $postlist[$i]; //get the foundation object from array
//store the object to separate variable
$usertype = $temp->getUserType();
$userID = $temp->getUserID();
$name = $temp->getName();
$title = $temp->getTitle();
$photo = $temp->getPhoto();
$postcontent = $temp->getPostContent();
$datetime = $temp->getDateTime();
$userpostID = $temp->getUserPostID();
?>  
<table style="border:1px solid" >
    <tr>
        <td><p style="float:left">
            <form name="profile<? echo $i ?>" action="PeopleCtrl.php" method="post">
                <input type="hidden" name="action" value="seepeopleprofile">
                <input type="hidden" name="peopleSelectedID" value="<? echo $userID ?>">
                <a href="javascript: profile<? echo $i ?>()"><? echo $name ?></a>
                <script type="text/javascript">
                    function profile<? echo $i ?>()
                    {
                        document.profile<? echo $i ?>.submit();
                    }
                </script>

            </form>
            </p>
<? if ($_SESSION['usernameU'] == $userID) { ?>
            <form onsubmit="return deletepost();" action="UserCtrl.php" method="post">
                <input type="hidden" name="action" value="deletepost"/>
                <input type="hidden" name="usertype" value="<? echo $usertype ?>"/>
                <input type="hidden" name="userid" value="<? echo $userID ?>"/>
                <input type="hidden" name="postid" value="<? echo $userpostID; ?>"/>
                <input style="float:right" type="submit" value="x"/>
                <!--<a style="float:right" href="javascript: deletepost()">x</a>-->
            </form>
<? } ?>
        </td>
    </tr>
    
<? if ($photo != null || $photo != '') { ?>
    <tr >
        <td bgcolor="c0c0c0" valign="middle" style="width:300px">
    <center><img style=" max-height:150px;"  src='../Database/Images/Sponsor/<?php echo $photo; ?>'/>
                                
    </center>
</td>
</tr>
<? } ?>
<tr >
        <td bgcolor="c0c0c0" valign="middle" style="width:300px">
    <?php echo $postcontent; ?>
        </td>
    </tr>
<tr>
    <td align="right"> <font size="2"><?php echo $datetime; ?></font></td>
</tr>


</table>
<? } ?>
<br/>
<?
} else {
    echo 'No Post Available';
}
?>
                                        
                                        
                                        
                                        
                                        
                                        <table>
                                            <tr>
                                                <td>PHOTO</td>
                                                <td>Nama Lengkap</td>
                                            </tr>
                                            <tr>
                                                <td>NOTIF</td>
                                            </tr>
                                        </table>
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



            <div class="Footer margin-top">
                <!-- footer div -->

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
    </body>

</html>