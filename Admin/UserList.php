<?session_start();
include 'User.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <script>
        function deleteuser(){
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
       <?include 'AdminHeader.php'?>
        <hr>
        
        <?php
        $userList=  unserialize($_SESSION['userlistdataobj']);
        if(count($userList)>0){
        ?>
            <table style="border:1px solid">
            <tr bgcolor="#c0c0c0">
                <td height="30px" style="min-width: 90px" valign="middle" align="center">Sponsor ID</td>
                <!--<td height="30px" style="min-width: 90px" valign="middle" align="center">Password</td>-->
                <td height="30px" style="min-width: 90px" valign="middle" align="center">Photo</td>
                <td height="30px" style="min-width: 90px" valign="middle" align="center">e-mail</td>
                <td height="30px" style="min-width: 90px" valign="middle" align="center">Name</td>
                <td height="30px" style="min-width: 90px" valign="middle" align="center">Address</td>
                <td height="30px" style="min-width: 90px" valign="middle" align="center">City</td>
                <td height="30px" style="min-width: 90px" valign="middle" align="center">State</td>
                <td height="30px" style="min-width: 90px" valign="middle" align="center">Country</td>
                <td height="30px" style="min-width: 90px" valign="middle" align="center">Postal Code</td>
                <td height="30px" style="min-width: 90px" valign="middle" align="center">Phone</td>
                <td height="30px" style="min-width: 90px" valign="middle" align="center">Coins</td>
                <td height="30px" style="min-width: 90px" valign="middle" align="center" colspan="2"></td>
                 
            </tr>
            
            <?
        
        
       for($i=0;$i<count($userList);$i++){
           $temp=$userList[$i];//get the foundation object from array
           
           //store the object to separate variable
           $sponsorID =  $temp->getSponsorID();
           $password =  $temp->getPassword();
           $email=$temp->getEmail();
           $name =  $temp->getName();
           
           $address = $temp->getAddress();
           $city = $temp->getCity();
           $state = $temp->getState();
           $country = $temp->getCountry();
           $postalCode  = $temp->getPostalCode();
           
           
           $phone = $temp->getPhone();
           $photo = $temp->getPhoto();
           $coins = $temp->getCoins();
           
           
           ?>
               <tr>
                   <td><?echo $sponsorID;?></td>                    
                   <!--<td><?echo $password;?></td>--> 
                   <td align="center"><img src="<?echo "../Database/Images/Sponsor/".$photo;?>" height="30"/></td> 
                   <td><?echo $email;?></td> 
                   <td><?echo $name;?></td> 
                   <td><?echo $address;?></td> 
                   <td><?echo $city;?></td> 
                   <td><?echo $state;?></td> 
                   <td align="center"><?echo $country;?></td> 
                   <td align="center"><?echo $postalCode;?></td> 
                   
                   <td align="right"><?echo $phone;?></td> 
                   <td align="center"><?echo $coins;?></td> 
               <td align="center">
                            <form action="UserCtrl.php" method="post">
                                <input type="hidden" name="action" value="prepareedituser">
                                <input type="hidden" name="userSelected" value="<? echo $sponsorID ?>">
                                <input type="submit" value="Edit">
                            </form>
                           
                        </td>
                        <td align="center">
                            
                            
                            <form action="UserCtrl.php" method="post" onsubmit="return deleteuser()">
                                <input type="hidden" name="action" value="deleteuser">
                                <input type="hidden" name="userSelected" value="<? echo $sponsorID ?>">
                                <input type="submit" value="Delete">
                            </form>
                        </td>
               </tr>
               
               <?
       }
        ?>
               </table>
        <?}
        else
        {
            echo 'Not Avaiable';
        }
        ?>
    </body>
</html>
