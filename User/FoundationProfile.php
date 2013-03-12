<?php
session_start();
include 'Foundation.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
      <?php include 'UserHeader.php' ?>
        <hr>

        <?php
        $foundationPost = unserialize($_SESSION['foundationpost']);
        $foundationdata = unserialize($_SESSION['foundationdataobj']);
        $names=$foundationdata->getName();
        $images=$foundationdata->getPhoto();
        
        ?>
    <center>
        <table>
            <tr>
                <td>
                    <img style="float:left;" height="70px"src="../Database/Images/Foundation/<?php echo $images ?>"/>
                    <p style="float:left;" ><font size="5"><?php echo $names; ?></font></p>
                </td>
            </tr>
        </table>
    </center>
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
            <table style="border:1px solid" >
                <tr>
                    <td><p style="float:left"><?php echo $title; ?></p>

                        <form   onsubmit="return deletepost();" action="FoundationCtrl.php" method="post">
                            <input type="hidden" name="foundationid" value="<? echo $_SESSION['usernameF']; ?>"/>
                            <input type="hidden" name="postid" value="<? echo $id; ?>"/>
                            <input type="hidden" name="action" value="deletepost"/>
                            <input style="float:right" type="submit" value="x"/>
                            <!--<a style="float:right" href="javascript: deletepost()">x</a>-->

                        </form>

                    </td>
                </tr>
                <tr >
                    <td bgcolor="c0c0c0" valign="middle" style="width:300px">
                        <?php
                        if (!$photo == "") {
                            ?>
                    <center><img style=" max-height:150px;"  src='../Database/Images/Foundation/<?php echo $photo; ?>'/>
                        <hr>                          
                    <?php } ?>
                </center>
                <?php echo $content; ?>
            </td>
        </tr>

        <tr>
            <td align="right"> <font size="2"><?php echo $time; ?></font></td>
        </tr>


        </table>
        <br/>
        <?php
    }
}
?>



    </body>
</html>
