<?  session_start();
include 'Foundation.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?include 'AdminHeader.php';?>
        <hr>
        <?
        $currentFoundation = unserialize($_SESSION['foundationdataobj']);
        $foundationID = $currentFoundation->getFoundationID();
        $photo=$currentFoundation->getPhoto();
        ?>
         <form id="form1" method="POST" action="FoundationCtrl.php" enctype="multipart/form-data">
            <input type="hidden" name="action" value="changelogo"/>
            <input type="hidden" name="id" value="<?echo $foundationID;?>"/>
            <table>
                <tr>
                    <td align="center"><img src="../Database/Images/Foundation/<? echo $photo; ?>" height="55px"/></td>
                    <td>&nbsp;&nbsp;&nbsp;<? echo $foundationID; ?></td>
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
