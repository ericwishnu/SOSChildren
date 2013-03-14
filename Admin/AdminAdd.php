<?  session_start();?>
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
                        id: {
                            required: true
                        },
       
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
        <?include 'AdminHeader.php'?>

        <hr>
       <form id="form1" action="AdminCtrl.php" method="post">
            <input type="hidden" name="action" value="addadmin"/>
            <table>
                <tr>
                    <td>AdminID</td>
                    <td><input type="text" name="id" id="id"/></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password1" id="password1" /></td>
                </tr>
                <tr>
                    <td>Confirm Password</td>
                    <td><input type="password" name="password2" id="password2" /></td>
                </tr>
                <tr>
                    <td>Position</td>
                    <td><input type="text" name="position" id="position"/></td>
                </tr>
                
                    <td></td>
                    <td><input type="submit" value="Submit" id="submit"/><td></td>
                </tr>
            </table>
        </form>

    </body>
</html>
