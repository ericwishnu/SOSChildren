<?
session_start();
include 'Foundation.php';
?>
<!DOCTYPE html>
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
//                        photo: {
//                            required: true
//
//                        },
//                        password1: {
//                            required: true,
//                            minlength: 6,
//                            maxlength: 16
//                        },
//                        password2: {
//                            required: true,
//                            equalTo: "#password1"
//                        },
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
        <? include 'FoundationHeader.php'; ?>
        <hr>
        <?php
        $currentFoundation = unserialize($_SESSION['foundationdataobj']);
        
        $foundationID = $currentFoundation->getFoundationID();
        $password = $currentFoundation->getPassword();
        $name = $currentFoundation->getName();
        $photo = $currentFoundation->getPhoto();
        $address = $currentFoundation->getAddress();
        $city = $currentFoundation->getCity();
        $state = $currentFoundation->getState();
        $country = $currentFoundation->getCountry();
        $postalCode = $currentFoundation->getPostalCode();
        $accountNo = $currentFoundation->getAccountNo();
        $phone = $currentFoundation->getPhone();
        $description = $currentFoundation->getDescription();
        
        ?>
        <form name="preparechangepassword" action="FoundationCtrl.php" method="post">
            <input type="hidden" name="action" value="preparechangepassword">
            <input type="hidden" name="id" value="<? echo $foundationID; ?>"/>
            <a href="javascript: preparechangepassword()">Change Password</a>
            <script type="text/javascript">
                function preparechangepassword()
                {
                    document.preparechangepassword.submit();
                }
            </script>
        </form>

        <form name="preparechangelogo" action="FoundationCtrl.php" method="post">
            <input type="hidden" name="action" value="preparechangelogo">
            <input type="hidden" name="id" value="<? echo $foundationID; ?>"/>
            <a href="javascript: preparechangelogo()">Change Logo</a>
            <script type="text/javascript">
                function preparechangelogo()
                {
                    document.preparechangelogo.submit();
                }
            </script>
        </form>
        <form id="form1" action="FoundationCtrl.php" method="post">
            <input type="hidden" name="action" value="addfoundation"/>
            <table>
                <tr>
                    <td align="center"><img width="55px" src="../Database/Images/Foundation/<? echo $photo; ?>"</td>
                    <td><? echo $foundationID ;?></td>
                </tr>

<!--                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password1" id="password1" /></td>
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
                    <td><input type="file" name="photo" id="photo" /> </td>
                </tr>-->
                <tr>
                    <td>Address</td>
                    <td><input type="text" name="address" id="address"value="<? echo $address; ?>" /></td>
                </tr>
                <tr>
                    <td>City</td>
                    <td><input type="text" name="city" id="city" value="<? echo $city ?>"/></td>
                </tr>
                <tr>
                    <td>State</td>
                    <td><input type="text" name="state" id="state" value="<? echo $state; ?>"/></td>
                </tr>
                <tr>
                    <td>Country</td>
                    <td><input type="text" name="country" id="country" value="<? echo $country ?>"/></td>
                </tr>
                <tr>
                    <td>Postal Code</td>
                    <td><input type="text" name="postalcode" id="postalcode" value="<? echo $postalCode; ?>"/></td>
                </tr>
                <tr>
                    <td>Account Number</td>
                    <td><input type="text" name="accnum" id="accnum" value="<? echo $accountNo; ?>"/></td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td><input type="tel" name="phone" id="phone" value="<? echo $phone; ?>"/></td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td><input type="text" name="description" value="<? echo $description; ?>"/><td></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Submit" id="submit"/><td></td>
                </tr>
            </table>
        </form>
    </body>
</html>
