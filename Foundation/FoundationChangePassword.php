<? session_start();
include 'Foundation.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <script type="text/javascript" src="../js/jquery-1.5.1.min.js"></script>
        <script type="text/javascript" src="../js/jquery-validation-1.8.0/jquery.validate.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {    
                $("#form1").validate({
                    rules: {

                        
                        password1: {
                            required: true,
                            minlength: 6,
                            maxlength: 16
                        },
                        password2: {
                            required: true,
                            equalTo: "#password1"
                        }
                        
                        
                    }
                });
            });
        </script> 
    </head>
    <body>
        <?include 'FoundationHeader.php';?>
        <hr>
        <?
        $currentFoundation = unserialize($_SESSION['foundationdataobj']);
        $foundationID = $currentFoundation->getFoundationID();
        $photo=$currentFoundation->getPhoto();
        ?>
         <form id="form1" method="POST" action="FoundationCtrl.php" enctype="multipart/form-data">
            <input type="hidden" name="action" value="changepassword"/>
            <input type="hidden" name="id" value="<?echo $foundationID;?>"/>
            <table>
                <tr>
                    <td align="center"><img src="../Database/Images/Foundation/<? echo $photo; ?>" height="55px"/></td>
                    <td>&nbsp;&nbsp;&nbsp;<? echo $foundationID; ?></td>
                </tr>
               
                <tr>
                    <td>Password</td>
                    <td><input id="password1" type="password" name="password1"/></td>
                </tr>
                <tr>
                    <td>Confirm Password</td>
                    <td><input id="password2" type="password" name="password2"/></td>
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
