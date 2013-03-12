<?session_start();
include 'Admin.php';?>
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
                        },
                        position: {
                            required: true
                        }
                        
                        
                    }
                });
            });
        </script> 
    </head>
    <body>
      <?include 'AdminHeader.php';?>
        <hr>
        <?
        $admininfo = unserialize($_SESSION['admindataobj']);
        $username = $admininfo->getAdminID();
        $position = $admininfo->getPosition();
        ?>
        <form id="form1" method="POST" action="AdminCtrl.php">
            <input type="hidden" name="action" value="editadmin"/>
            <input type="hidden" name="id" value="<?echo $username;?>"/>
            <table>
                <tr>
                    <td>Username</td>
                    <td><? echo $username; ?></td>
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
                    <td>Position</td>
                    <td><input id="position" type="text" name="position" value="<? echo $position; ?>"/></td>
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
