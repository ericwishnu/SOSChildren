<?session_start();
include 'User.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        
    </head>
    <body>
       <?include 'UserHeader.php'?>
        <hr>
        
        <?php
        $peopleList=  unserialize($_SESSION['searchpeopledataobj']);
        
        if(count($peopleList)>0 || $_SESSION['searchpeopleresult']="1")
        {
        ?>
            <table style="border:1px solid">
            <tr bgcolor="#c0c0c0">
                <td height="30px" style="min-width: 90px" valign="middle" align="center">Username</td>
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
        
        
       for($i=0;$i<count($peopleList);$i++){
           $temp=$peopleList[$i];//get the foundation object from array
           
           //store the object to separate variable
           $peopleID =  $temp->getSponsorID();
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
                   <td><?echo $peopleID;?></td>                    
                   <!--<td><!--?echo $password;?></td>--> 
                   <td align="center"><img src="<?echo "../Database/Images/Sponsor/".$photo;?>" width="30"height="30"/></td> 
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
                        <form action="PeopleCtrl.php" method="post">
                            <input type="hidden" name="action" value="seepeopleprofile">
                            <input type="hidden" name="peopleSelectedID" value="<? echo $peopleID ?>">
                            <input type="submit" value="View Profile">
                        </form>
                   </td>
               </tr>
               
               <?
       }
        ?>
               </table>
        <?}
        else if($_SESSION['searchresult'] == "0")
        {
            echo 'Not Avaiable';
        }
        else
        {
            echo 'Not Avaiable';
        }
        ?>
        
    </body>
</html>
