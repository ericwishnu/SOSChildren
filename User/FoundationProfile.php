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
                                    <div class="accordion" id="accordion2">
                                        <div class="accordion-group">
                                            <div class="accordion-heading">
                                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                                                    <h4>Sejarah & Latar Belakang</h4>
                                                </a>
                                            </div>
                                            <div id="collapseOne" class="accordion-body collapse in">
                                                <div class="accordion-inner">
                                                    <br>
                                                    <p>
                                                        Yayasan Lima Roti Dua Ikan Indonesia dimulai dari sebuah persekutuan doa yang berdiri pada sekitar bulan Oktober 2003, yang menamakan diri persekutuan doa Lima Roti Dua Ikan. Pendiri mendapat pewahyuan “ajaib” melalui firman Tuhan dalam Kisah Rasul pasal 6 pada tahun 1998. Dalam Kisah Rasul pasal 6 ada beberapa orang yang dipilih untuk melayani meja (handle finance, TEV) bagi para janda, dan oleh karenanya firman Allah semakin tersebar, jumlah murid bertambah dan sejumlah besar imam (hamba Tuhan) menyerahkan diri dan menjadi percaya. Walaupun arti dari firman itu pada saat itu belum sepenuhnya dimengerti, tetapi nantinya akan menjadi dasar acuan bagi pewahyuan-pewahyuan berikutnya yang diterima oleh pendiri sehingga yayasan pada akhirnya bisa terbentuk.
                                                        Pada bulan Februari 2004 pendiri kembali mendapat pewahyuan susulan melalui firman Tuhan (dalam suatu pergumulan doa di Taman Getsemani, Semarang). Tuhan memberikan ayat di 2 Raja-raja 4:42-44, dan melalui ayat ini pendiri diberikan konfirmasi untuk melayani Tuhan sepenuh waktu. Perintah Tuhan pada waktu itu adalah untuk memberi makan para abdi Allah, supaya mereka bisa melayani bangsa ini dengan maksimal. Tuhan meneguhkan perintah itu dengan memberikan kepada pendiri sebuah “tanda” konfirmasi yang masih disimpan pendiri sampai saat ini.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-group">
                                            <div class="accordion-heading">
                                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                                                    <h4>Visi & Misi</h4>
                                                </a>
                                            </div>
                                            <div id="collapseTwo" class="accordion-body collapse">
                                                <div class="accordion-inner">
                                                    <p>
                                                        VISI
                                                        <br>
                                                        Menjadi model lembaga pelayanan holistik pengentasan kemiskinan yang menghadirkan kerajaan Allah
                                                        <br><br>    
                                                        MISI
                                                        <br>
                                                        Melayani komunitas orang-orang tersisihkan secara holistik bermitra dengan “kaum Lewi”
                                                        <br><br>
                                                        MOTTO
                                                        <br>
                                                        Melayani Tuhan dengan memperhatikan sesama (We serve the Lord by serving others)
                                                    </p>
                                                    <hr>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-group">
                                            <div class="accordion-heading">
                                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
                                                    <h4> Q & A </h4>
                                                </a>
                                            </div>
                                            <div id="collapseThree" class="accordion-body collapse">
                                                <div class="accordion-inner">
                                                    <p>
                                                        <b>What does the foundation do?</b>
                                                        <br>
                                                        The Five Loaves and Two Fishes foundation is a non profit charitable organization that provide holistic charitable works for the poor and the needy. The people we serve is adult and children of all ages. Also we take care of the elderly and minister to the prisoners at prisons and other detention places.
                                                        <br><br>
                                                        <b>How did it get started?</b>
                                                        <br>
                                                        It started when Marko Budiman surrender his life to the Lord by gathering several of his friends to begin caring for the poor and the needy in 2004. Soon the number grew bigger and now they can accumulated enough money to do it in a regular basic. Soon the words spread out to other organizations and churches who loves their works for the poor and the needy, and they joined them. What began as a spark of flame has turned into a torch of love.
                                                        <br><br>
                                                        <b>Where do the money go?</b>
                                                        <br>
                                                        Since its beginning, the foundation has provided meals, basic needed goods to family shelters, and to numerous humanitarian organization around Jakarta and throughout Indonesia. We also sending our help to many of the disaster struck victims in Indonesia. All the proceed go to the most poor and the needy.
                                                        <br><br>
                                                        <b>Where do you get the money?</b>
                                                        <br>
                                                        Part of the money is donated by inner circle friends who share the same vision and passion. Other funding is donated by various individuals and organizations. Although many things at the foundation are donated, it now currently takes about $ 200,000 per year to run operations throughout Indonesia.
                                                        Although blessing of donations always seem to cover expenses, funding is becoming crucial for this rapidly growing endeavor. Any donations helps. The Five Loaves and Two Fishes volunteers are mission and social workers, they are not fund raisers.
                                                        <br><br>
                                                        <b>Does anyone get paid?</b>
                                                        <br>
                                                        Great blessing to the heart and soul are the only payment. Only one secretary and one mission field officer getting paid. All others, including chairman, managers, and public relation, is volunteer. (starting 2009 everyone in the foundation is volunteer)
                                                        <br><br>
                                                        <b>Who is the volunteers at the foundation?</b>
                                                        <br>
                                                        Volunteers at the foundation are a cross section of the community. They are young and old, male and female. Some works several hours a week, some given more.
                                                        <br><br>
                                                        <b>How can I help?</b>
                                                        <br>
                                                        You can donate money or supplies of goods, or spread the word to those who may be in the position to help.


                                                    </p>
                                                    <hr>    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-group">
                                            <div class="accordion-heading">
                                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseFour">
                                                    <h4>Sejarah & Latar Belakang</h4>
                                                </a>
                                            </div>
                                            <div id="collapseFour" class="accordion-body collapse">
                                                <div class="accordion-inner">
                                                    <br>
                                                    <p>
                                                        Yayasan Lima Roti Dua Ikan Indonesia dimulai dari sebuah persekutuan doa yang berdiri pada sekitar bulan Oktober 2003, yang menamakan diri persekutuan doa Lima Roti Dua Ikan. Pendiri mendapat pewahyuan “ajaib” melalui firman Tuhan dalam Kisah Rasul pasal 6 pada tahun 1998. Dalam Kisah Rasul pasal 6 ada beberapa orang yang dipilih untuk melayani meja (handle finance, TEV) bagi para janda, dan oleh karenanya firman Allah semakin tersebar, jumlah murid bertambah dan sejumlah besar imam (hamba Tuhan) menyerahkan diri dan menjadi percaya. Walaupun arti dari firman itu pada saat itu belum sepenuhnya dimengerti, tetapi nantinya akan menjadi dasar acuan bagi pewahyuan-pewahyuan berikutnya yang diterima oleh pendiri sehingga yayasan pada akhirnya bisa terbentuk.
                                                        Pada bulan Februari 2004 pendiri kembali mendapat pewahyuan susulan melalui firman Tuhan (dalam suatu pergumulan doa di Taman Getsemani, Semarang). Tuhan memberikan ayat di 2 Raja-raja 4:42-44, dan melalui ayat ini pendiri diberikan konfirmasi untuk melayani Tuhan sepenuh waktu. Perintah Tuhan pada waktu itu adalah untuk memberi makan para abdi Allah, supaya mereka bisa melayani bangsa ini dengan maksimal. Tuhan meneguhkan perintah itu dengan memberikan kepada pendiri sebuah “tanda” konfirmasi yang masih disimpan pendiri sampai saat ini.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row-fluid margin-top">
                                    <div id="myCarousel" class="carousel slide">
                                        <ol class="carousel-indicators">
                                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                            <li data-target="#myCarousel" data-slide-to="1"></li>
                                            <li data-target="#myCarousel" data-slide-to="2"></li>
                                        </ol>
                                        <!-- Carousel items -->
                                        <div class="carousel-inner">
                                            <div class="active item"><img src="../img/Foundation/limaRoti/1.jpg"></div>
                                            <div class="item"><img src="../img/Foundation/limaRoti/2.jpg"></div>
                                            <div class="item"><img src="../img/Foundation/limaRoti/3.jpg"></div>
                                            <div class="item"><img src="../img/Foundation/limaRoti/4.jpg"></div>
                                        </div>
                                        <!-- Carousel nav -->
                                        <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
                                        <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
                                    </div>

                                </div>

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
