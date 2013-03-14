<?  session_start();
include 'User.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
       <?include 'UserHeader.php';?>
        <hr>
        <?
        $currentSponsor = unserialize($_SESSION['userdataobj']);
        $sponsorID = $currentSponsor->getSponsorID();
        $photo=$currentSponsor->getPhoto();
        ?>
         <form id="form1" method="POST" action="UserCtrl.php" enctype="multipart/form-data">
            <input type="hidden" name="action" value="changepicture"/>
            <input type="hidden" name="id" value="<?echo $sponsorID;?>"/>
            <table>
                <tr>
                    <td align="center"><img src="../Database/Images/Sponsor/<? echo $photo; ?>" height="80px"/></td>
                    <td>&nbsp;&nbsp;&nbsp;<? echo $sponsorID; ?></td>
                </tr>
               
                <tr>
                    <td>Photo</td>
                    <td>
                        <input type="hidden" name="prevphoto" value="<? echo $photo; ?>"/>
                        <input id="photo" type="file" name="photo"/>
                    </td>
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
