<?php
session_start();
include 'User.php';
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
                        id: {
                            required: true
                        },
                        name: {
                            required: true,
                            minlength: 4,
                            maxlength: 50
                        },
                        email: {
                            required: true,
                            email: true
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
                        phone: {
                            required: true

                        }

                    }
                });
            });
        </script> 
    </head>
    <body>
        <?php
        include 'UserHeader.php';
        ?>
        <hr>
        <?
        $userinfo = unserialize($_SESSION['userdataobj']);
        $sponsorID = $userinfo->getSponsorID();
        $photo = $userinfo->getPhoto();
        $email = $userinfo->getEmail();
        $name = $userinfo->getName();
        $address = $userinfo->getAddress();
        $city = $userinfo->getCity();
        $state = $userinfo->getState();
        $country = $userinfo->getCountry();
        $postalCode = $userinfo->getPostalCode();
        $phone = $userinfo->getPhone();
        ?>
        <table>
            
            <tr>
                <td>
                    <tr>
                <td align="center">
                    <img height="80px"src="../Database/Images/Sponsor/<? echo $photo; ?>" /></br>
                    
                </td>
                <td valign="middle"><? echo $sponsorID ?></td>
            </tr>
                </td>
            </tr>
        <table>
            
            <form id="form1" action="UserCtrl.php"  method="POST">
                <input type="hidden" name="action" value="editprofile">

                <tr>
                    <td>Email</td>
                    <td><input id="email" type="text" name="email" value="<? echo $email; ?>"/></td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td><input id="name" type="text" name="name" value="<? echo $name; ?>"/></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td><input id="address" type="text" name="address" value="<? echo $address; ?>"/></td>
                <tr>
                    <td>City</td>
                    <td><input id="city" type="text" name="city" value="<? echo $city ?>"/></td>
                </tr>
                <tr>
                    <td>State</td>
                    <td><input id="state" type="text" name="state" value="<? echo $state; ?>"/></td>
                </tr>
                <tr>
                    <td>Country</td>
                    <td><input id="country" type="text" name="country" value="<? echo $country; ?>"/></td>
                </tr>
                <tr>
                    <td> Postal Code</td>
                    <td><input id="postalcode" type="text" name="postalcode" value="<? echo $postalCode; ?>"/></td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td><input id="phone" type="text" name="phone" value="<? echo $phone; ?>"/></td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="Save">
                    </td>
                </tr>



            </form>
        </table>
    </body>
</html>
