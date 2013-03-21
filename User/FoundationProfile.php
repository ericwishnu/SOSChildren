<?php
session_start();
include 'Foundation.php';
$userdata = unserialize($_SESSION['userdata']);
$foundationPost = unserialize($_SESSION['foundationpost']);
$foundationdata = unserialize($_SESSION['foundationdataobj']);
$foundationID=$foundationdata->getFoundationID();
$names = $foundationdata->getName();
$images = $foundationdata->getPhoto();
$city=$foundationdata->getCity();
$country=$foundationdata->getCountry();
$address=$foundationdata->getAddress();
$phone=$foundationdata->getPhone();
$postalCode=$foundationdata->getPostalCode();
$state=$foundationdata->getState();
$description=$foundationdata->getDescription();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/mainMenuCss.css">
        <link rel="stylesheet" type="text/css" href="../css/FoundationProfile.css">
        <title>Foundation Profile</title>
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
                            <div class="foundationProfilePicture span2">

                                <img style="border-radius:10px" src="../Database/Images/Foundation/<?php echo $images ?>"/>
                                <p style="float:left;" ><font size="5"><?php echo $names; ?></font></p>
                            </div>

                            <div class="foundationProfilePost span9">
                                <div class="row-fluid">

                                    <div class="span11 offset1">
                                        <h2><?php echo $names; ?></h2>
                                        <?php echo $city?> - 
                                        <?php echo $country?>
                                    </div>	
                                </div>
                            </div>

                        </div>

                        <div class="row-fluid margin-top">
                            <!-- Main Menu Class -->
                            <div class="span12">

                                <div class="row-fluid">
                                    <div class="foundationProfileTop">
                                        <div class="myFont">
                                            <p class="myFont"> Information </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row-fluid">
                                    <div class="foundationProfileMiddle">
                                        <div class="row-fluid">
                                            <h4>Where to Find ?</h4>
                                            
                                       
                                        <?php echo $address." - ".$state ?><br/>
                                        <?php echo $city." - ". $country?><br/>
                                        Postal Code : <?php echo $postalCode;?></br>
                                        Phone : <?php echo $phone?> <br/><br/>
                                        <p ><?php echo $description?><br/></p>
                                        </br>
                                        <div class="row-fluid"> 
                                        <form action="KidsCtrl.php" method="POST">
                                            <input type="hidden" name="foundationid" value="<?php echo $foundationID?>"/>
                                            <input type="hidden" name="action" value="listkidsbyfoundation"/>
                                            <input type="submit" class="browseKids span2" value=""/>
                                        </form>
                                        </div>
                                        
                                     
                                        <hr>
                                        
                                        
               
                                        <?php
                                        if (count($foundationPost) > 0) {
                                            for ($i = count($foundationPost) - 1; $i >= 0; $i--) {
                                                $temp = $foundationPost[$i];
                                                // echo $temp[0]."|". $temp[1]."|". $temp[2]."|". $temp[3]."|". $temp[4]."<br/>";
                                                $id = $temp[0];
                                                $title = $temp[1];
                                                $photo = $temp[2];
                                                $time = $temp[3];
                                                $content = $temp[4];
                                                ?>
                                                <table style="width:100%"  >
                                                    <tr>
                                                        <td><div style="float:left"><a><?php echo $title; ?></a></div>

<!--                                                            <form   onsubmit="return deletepost();" action="FoundationCtrl.php" method="post">
                                                                <input type="hidden" name="foundationid" value="<?// echo $_SESSION['usernameF']; ?>"/>
                                                                <input type="hidden" name="postid" value="<?// echo $id; ?>"/>
                                                                <input type="hidden" name="action" value="deletepost"/>
                                                                <input style="float:right" type="submit" value="x"/>
                                                                <a style="float:right" href="javascript: deletepost()">x</a>

                                                            </form>-->

                                                        </td>
                                                    </tr>
                                                    <tr >
                                                        <td >
                                                            <?php
                                                            if (!$photo == "") {
                                                                ?>
                                                        <img style=" max-height:150px;"  src='../Database/Images/Foundation/<?php echo $photo; ?>'/>
                                                                                    
                                                        <?php } ?>
                                                 
                                                   
                                                    </td>
                                                    </tr>
                                                    <tr>
                                                        <td> <?php echo $content; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right"> 
                                                            <font size="2"><?php echo $time; ?></font>
                                                         
                                                        </td>
                                                    
                                                    </tr>


                                                </table>
                                         <hr>
                                                
                                                <?php
                                            }
                                        }
                                        ?>
                                        </div>
                                       
                                    </div>
                                </div>

                                <div class="row-fluid">
                                    <div class="foundationProfileBot">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
       


                    <div class="Footer margin-top">
                        <!-- footer div -->

                    </div>




                    <!-- SCRIPT !!!  -->

                    <script src="../js/jquery.js"></script>  
                    <script src="../js/bootstrap-modal.js"></script>  
                    <script src="../js/js-script.js"></script>
                    <script src="../js/bootstrap.min.js"></script>



                    <hr>




                    </body>
                    </html>
