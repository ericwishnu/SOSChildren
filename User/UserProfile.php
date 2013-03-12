<?
session_start();
include 'User.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
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
        <tr>
            <td>Email</td>
            <td><? echo $email; ?></td>
        </tr>
        <tr>
            <td>Name</td>
            <td><? echo $name; ?></td>
        </tr>
        <tr>
            <td>Address</td>
            <td><? echo $address; ?></td>
        <tr>
            <td>City</td>
            <td><? echo $city; ?></td>
        </tr>
        <tr>
            <td>State</td>
            <td><? echo $state; ?></td>
        </tr>
        <tr>
            <td>Country</td>
            <td><? echo $country; ?></td>
        </tr>
        <tr>
            <td> Postal Code</td>
            <td><? echo $postalCode; ?></td>
        </tr>
        <tr>
            <td>Phone</td>
            <td><? echo $phone; ?></td>
        </tr>
        <tr>
            <td>

                <form name="preeditprofile" action="UserCtrl.php" method="post">
                    <input type="hidden" name="action" value="preeditprofile">
                    <a href="javascript: preeditprofile()">Edit Profile</a>
                    <script type="text/javascript">
                        function preeditprofile()
                        {
                            document.preeditprofile.submit();
                        }
                    </script>
                </form>
            </td>
        </tr>
        <tr>
            <td>
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
            </td>
        </tr>
    </table>
    <?php
    $userpost = unserialize($_SESSION['userpost']);
  
    if (count($userpost) > 0) {
          
        //for ($i = count($userpost) -1; $i > 0; $i--) {
            $i=count($userpost);
            while($i>0){
                
            
            
            $temp = $userpost[$i-1];
            // echo $temp[0]."|". $temp[1]."|". $temp[2]."|". $temp[3]."|". $temp[4]."<br/>";
            $id = $temp[0];
            $photo = $temp[2];
            $content = $temp[3];
            $time = $temp[4];
            ?>
            <table style="border:1px solid" >
                <tr>
                    <td><p style="float:left"><?php echo $name; ?></p>

                        <form   onsubmit="return deletepost();" action="UserCtrl.php" method="post">
                            <input type="hidden" name="userid" value="<? echo $_SESSION['usernameU']; ?>"/>
                            <input type="hidden" name="postid" value="<? echo $id; ?>"/>
                            <input type="hidden" name="action" value="deletepost"/>
                            <input style="float:right" type="submit" value="x"/>
                            <!--<a style="float:right" href="javascript: deletepost()">x</a>-->

                        </form>

                    </td>
                </tr>
                <tr >
                    <td bgcolor="c0c0c0" valign="middle" style="width:300px">

<?php
                        if (!$photo == "") {
                            ?>
                    <center><img style=" max-height:150px;"  src='../Database/Images/Sponsor/<?php echo $photo; ?>'/>
                        <hr>                          
                    <?php } ?>
                </center>
                        <?php echo $content; ?>
                    </td>
                </tr>

                <tr>
                    <td align="right"> <font size="2"><?php echo $time; ?></font></td>
                </tr>


            </table>
            <br/>
            <?php
            $i--;
        }
    }
    ?>



</body>
</html>
