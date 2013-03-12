<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<?
session_start();
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <script type="text/javascript"         src="../js/jquery-1.5.1.min.js"></script>
        <script type="text/javascript" src="../js/jquery-validation-1.8.0/jquery.validate.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {    
                $("#form1").validate({
                    rules: {
                        id: {
                            required: true
                        },
                        nama: {
                            required: true
                        },
                        email: {
                            required: true,
                            email: true
                        },
           
                        name: {
                            required: true,
                            minlength: 4,
                            maxlength: 50
                        },
                        photo: {
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
                        address: {
                            required: true
                            
                        },
                        city: {
                            required: true
                            
                        },
                        state: {
                            required: true
                            
                        },
                        country: {
                            required: true
                            
                        },
                        postalcode: {
                            required: true
                           
                        },
                        accnum: {
                            required: true
                            
                        },
                        phone: {
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
        <form id="form1" action="FoundationCtrl.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="action" value="addfoundation"/>
            <table>
                <tr>
                    <td>FoundationID</td>
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
                    <td>Name</td>
                    <td><input type="text" name="name" id="name"/></td>
                </tr>
                <tr>
                    <td>Photo</td>
                    <td><input type="file" name="photo" id="file" /></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td><input type="text" name="address" id="address" /><td></td>
                </tr>
                <tr>
                    <td>City</td>
                    <td><input type="text" name="city" id="city"/><td></td>
                </tr>
                <tr>
                    <td>State</td>
                    <td><input type="text" name="state" id="state" /></td>
                </tr>
                <tr>
                    <td>Country</td>
                    <td><input type="text" name="country" id="country"/><td></td>
                </tr>
                <tr>
                    <td>Postal Code</td>
                    <td><input type="text" name="postalcode" id="postalcode"/><td></td>
                </tr>
                <tr>
                    <td>Account Number</td>
                    <td><input type="text" name="accnum" id="accnum"/></td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td><input type="tel" name="phone" id="phone"/><td></td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td><input type="text" name="description" /><td></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Submit" id="submit"/><td></td>
                </tr>
            </table>
        </form>

    </body>
</html>
