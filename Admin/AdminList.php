<?php
session_start();
include 'Admin.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <script>
        function deleteadmin(){
            var stat=confirm("Are you sure?");
            if(stat==true){
                return true
            }
            else{
                return false;
            }
            
        }    
        </script>
    </head>
    <body>
<?php include 'AdminHeader.php' ?>


        <hr>
        <?php
        $adminList = unserialize($_SESSION['adminlistdataobj']);
        if (count($adminList) > 0) {
            ?>
            <table style="border:1px solid">
                <tr bgcolor="#c0c0c0">
                    <td height="30px" style="min-width: 90px" valign="middle" align="center">Admin ID</td>
                    <td height="30px" style="min-width: 90px" valign="middle" align="center">Password</td>
                    <td height="30px" style="min-width: 90px" valign="middle" align="center">Position</td>
                    <td height="30px" style="min-width: 50px" valign="middle" align="center" colspan="2"></td>
                    
                </tr>

                <?php
                $adminID;
                $password;
                $position;
                for ($i = 0; $i < count($adminList); $i++) {
                    $temp = $adminList[$i];
                    $adminID = $temp->getAdminID();
                    $password = $temp->getPassword();
                    $position = $temp->getPosition();
                    ?>
                    <tr>
                        <td><?php echo $adminID; ?></td>                    
                        <td><?php echo $password; ?></td> 
                        <td><?php echo $position; ?></td> 
                        <td align="center">
                            
                            <form action="AdminCtrl.php" method="post">
                                <input type="hidden" name="action" value="prepareeditadmin">
                                <input type="hidden" name="adminSelected" value="<? echo $adminID ?>">
                                <input type="submit" value="Edit">
                            </form>
                           
                        </td>
                        <td align="center">
                            
                            
                            <form action="AdminCtrl.php" method="post" onsubmit="return deleteadmin()">
                                <input type="hidden" name="action" value="deleteadmin">
                                <input type="hidden" name="adminSelected" value="<? echo $adminID ?>">
                                <input type="submit" value="Delete">
                            </form>
                        </td>
                    </tr>

                    <?php
                }
                ?>
            </table>
        <?php
        } else {
            echo 'Not Avaiable';
        }
        ?>
    </body>
</html>
