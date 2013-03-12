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
        <?
        include 'UserHeader.php';
        ?>
        <hr>
        <?
        $userinfo = unserialize($_SESSION['userdataobj']);
        $sponsorID = $userinfo->getSponsorID();
        $photo = $userinfo->getPhoto();

        ?>


        <table>
            <tr>
                <td align="center">
                    <img height="80px" src="../Database/Images/Sponsor/<? echo $photo; ?>" /></br>
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
                <td valign="middle"><? echo $sponsorID ?></td>
            </tr>
            <tr>
                <td align="left">
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
                </td>
            </tr>
            <tr>
                <td align="left">
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
        </table>


    </body>
</html>
