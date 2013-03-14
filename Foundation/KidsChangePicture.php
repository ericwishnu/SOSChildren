<?php  session_start();
include 'Kids.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?include 'FoundationHeader.php';?>
        <hr>
        <?
        $currentKids = unserialize($_SESSION['kidsdataobj']);
        $kidsID = $currentKids->getKidsID();
        $photo=$currentKids->getPhoto();
        ?>
         <form id="form1" method="POST" action="KidsCtrl.php" enctype="multipart/form-data">
            <input type="hidden" name="action" value="changepicture"/>
            <input type="hidden" name="id" value="<?echo $kidsID;?>"/>
            <table>
                <tr>
                    <td align="center"><img src="../Database/Images/Kids/<? echo $photo; ?>" height="55px"/></td>
                    <td>&nbsp;&nbsp;&nbsp;<? echo $kidsID; ?></td>
                </tr>
               
                <tr>
                    <td>Photo</td>
                    <td><input id="photo" type="file" name="photo"/></td>
                </tr>
                

                <tr>
                    <td>
                        <input type="submit" value="Save"/>
                    </td>
                </tr>

            </table>
        </form>
    </body>
</html>
