<?php  session_start();
include 'User.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <? include 'AdminHeader.php' ?>

        <hr>

        <?
        $currentSponsor = unserialize($_SESSION['sponsordataobj']);
        $sponsorID = $currentSponsor->getSponsorID();
        $password = $currentSponsor->getPassword();
        $name = $currentSponsor->getName();
        $photo = $currentSponsor->getPhoto();
        $address = $currentSponsor->getAddress();
        $city = $currentSponsor->getCity();
        $state = $currentSponsor->getState();
        $country = $currentSponsor->getCountry();
        $postalCode = $currentSponsor->getPostalCode();
        $email = $currentSponsor->getEmail();
        $phone = $currentSponsor->getPhone();
        $coins = $currentSponsor->getCoins();
        ?>
        <form name="preparechangepassword" action="UserCtrl.php" method="post">
            <input type="hidden" name="action" value="preparechangepassword">
            <input type="hidden" name="id" value="<? echo $sponsorID; ?>"/>
            <a href="javascript: preparechangepassword()">Change Password</a>
            <script type="text/javascript">
                function preparechangepassword()
                {
                    document.preparechangepassword.submit();
                }
            </script>
        </form>
        
        <form name="preparechangepicture" action="UserCtrl.php" method="post">
            <input type="hidden" name="action" value="preparechangepicture">
            <input type="hidden" name="id" value="<? echo $sponsorID; ?>"/>
            <a href="javascript: preparechangepicture()">Change Picture</a>
            <script type="text/javascript">
                function preparechangepicture()
                {
                    document.preparechangepicture.submit();
                }
            </script>
        </form>
        
        <form id="form1" action="UserCtrl.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="action" value="edituser"/>
            <input type="hidden" name="id" value="<? echo $sponsorID; ?>"/>
            <table >
                <tr>
                    <td align="center"><img src="../Database/Images/Sponsor/<? echo $photo; ?>" height="55px"/></td>
                    <td>&nbsp;&nbsp;&nbsp;<? echo $sponsorID; ?></td>
                </tr>
<!--                <tr>
                    <td>Password</td>
                    <td><input type="text" name="password1" id="password1" /></td>
                </tr>
                <tr>
                    <td>Confirm Password</td>
                    <td><input type="password" name="password2" id="password2" /></td>
                </tr>-->
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="name" id="name" value="<? echo $name; ?>"/></td>
                </tr>
<!--                <tr>
                    <td>Photo</td>
                    <td valign="middle"><input type="file" name="photo" id="file" /></td>
                </tr>-->
                <tr>
                    <td>Address</td>
                    <td><input type="text" name="address" id="address" value="<? echo $address; ?>"/></td>
                </tr>
                <tr>
                    <td>City</td>
                    <td><input type="text" name="city" id="city" value="<? echo $city; ?>"/></td>
                </tr>
                <tr>
                    <td>State</td>
                    <td><input type="text" name="state" id="state" value="<? echo $state; ?>"/></td>
                </tr>
                <tr>
                    <td>Country</td>
                    <td><input type="text" name="country" id="country" value="<? echo $country; ?>"/></td>
                </tr>
                <tr>
                    <td>Postal Code</td>
                    <td><input type="text" name="postalcode" id="postalcode" value="<? echo $postalCode; ?>"/></td>
                </tr>
                <tr>
                    <td>e-mail</td>
                    <td><input type="text" name="email" id="email" value="<? echo $email; ?>"/></td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td><input type="tel" name="phone" id="phone" value="<? echo $phone; ?>"/></td>
                </tr>
                <tr>
                    <td>Coins</td>
                    <td><input type="text" name="coins" value="<? echo $coins; ?>"/></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Submit" id="submit"/></td>
                </tr>
            </table>
        </form>
    </body>
</html>
