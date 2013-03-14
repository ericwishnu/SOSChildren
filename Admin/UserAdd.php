<?  session_start();?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?include 'AdminHeader.php'?>

        <hr>
        <form id="form1" action="UserCtrl.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="action" value="adduser"/>
            <table>
                <tr>
                    <td>User ID</td>
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
                    <td>e-mail</td>
                    <td><input type="email" name="email" id="email"/></td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="name" id="name"/></td>
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
                    <td>Phone</td>
                    <td><input type="tel" name="phone" id="phone"/><td></td>
                </tr>
                <tr>
                    <td>Photo</td>
                    <td><input type="file" name="photo" id="file" /></td>
                </tr>
                <tr>
                    <td>Coins</td>
                    <td><input type="text" name="coins" /><td></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Submit" id="submit"/><td></td>
                </tr>
            </table>
        </form>

    </body>
</html>
