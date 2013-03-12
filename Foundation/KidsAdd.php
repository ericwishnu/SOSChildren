<? session_start(); 


?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <script type="text/javascript" src="../js/jquery-1.5.1.min.js"></script>
        <script type="text/javascript" src="../js/jquery-ui-1.8.11.custom.min.js"></script>        
        <link rel="stylesheet" type="text/css" href="../js/css/ui-lightness/jquery-ui-1.8.11.custom.css" />   
        
        <script type="text/javascript">
            $(document).ready(function() {
                $("#DOB").datepicker({
                    dateFormat: "yy-mm-dd",
                    changeMonth: true,
                    changeYear: true,
                    yearRange: "-100:+0"
                });
            });
        </script> 
    </head>
    <body>
        <? include 'FoundationHeader.php' ?>

        <hr>
        <?
        //$foundationList = unserialize($_SESSION['foundationdataobj']);
        $foundationID=$_SESSION['foundationid'];
        ?>
        <form action='KidsCtrl.php' method="post" enctype="multipart/form-data">
            <input type="hidden" name="action" value="addkid">
            <input type="hidden" name="foundationid" value="<?echo $foundationID;?>"/>
            <table border="0">
                <tr>
                    <td>Foundation</td>
                    <td>

                        <?echo $foundationID;?>
                    </td>
                </tr>
                <tr>
                    <td>Kids ID (in Foundation)</td>
                    <td><input type="text" name="kidsID"></td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="kidsname"></td>
                </tr>
                <tr>
                    <td>Photo</td>
                    <td><input type="file" name="photo" id="file" width="100" /></td>
                </tr>
                <tr>
                    <td>Date Of Birth</td>
                    <td><input type="text" name="DOB" id="DOB"value="YYYY-MM-DD"></td>
                </tr>
                <tr>
                    <td valign="top">Background</td>
                    <td><textarea name="background"></textarea></td>
                </tr>
                <tr>
                    <td>Region</td>
                    <td><input type="text" name="region"></td>
                </tr>
                <tr>
                    <td>Origin</td>
                    <td><input type="text" name="origin"></td>
                </tr>
                <tr>
                    <td valign="top">Aspiration</td>
                    <td><textarea name="aspiration"></textarea></td>
                </tr>
                <tr>
                    <td valign="top">Needs</td>
                    <td>
                        <input type="checkbox" name="health" value="true">Health <br>
                        <input type="checkbox" name="education" value="true">Education <br>
                        <input type="checkbox" name="nutrition" value="true">Nutrition
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" value="Save">
                    </td>
                </tr>

             
            </table>
        </form>
    </body>
</html>
