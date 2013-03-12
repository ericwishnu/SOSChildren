<?session_start();
include 'User.php';
include 'Foundation.php';
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
        if($_SESSION['globalsearchresult']=="1")
        {
        $peopleList=  unserialize($_SESSION['searchpeopledataobj']);
        
        if(count($peopleList)>0)
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
               </table><br>
        <?}
        else
        {
            echo 'People Not Avaiable<br>';
        }
        
        $foundationList=  unserialize($_SESSION['searchfoundationdataobj']);
        
        if(count($foundationList)>0)
        {
        ?>
            <table style="border:1px solid">
            <tr bgcolor="#c0c0c0">
                <td height="30px" style="min-width: 90px" valign="middle" align="center">Foundation ID</td>
                <!--<td height="30px" style="min-width: 90px" valign="middle" align="center">Password</td>-->
                <td height="30px" style="min-width: 90px" valign="middle" align="center">Photo</td>
                <td height="30px" style="min-width: 90px" valign="middle" align="center">Name</td>
                <td height="30px" style="min-width: 90px" valign="middle" align="center">Address</td>
                <td height="30px" style="min-width: 90px" valign="middle" align="center">City</td>
                <td height="30px" style="min-width: 90px" valign="middle" align="center">State</td>
                <td height="30px" style="min-width: 90px" valign="middle" align="center">Country</td>
                <td height="30px" style="min-width: 90px" valign="middle" align="center">Postal Code</td>
                <td height="30px" style="min-width: 90px" valign="middle" align="center">Phone</td>
                <td height="30px" style="min-width: 90px" valign="middle" align="center">Description</td>
                <td height="30px" style="min-width: 90px" valign="middle" align="center" colspan="2"></td>
            </tr>
            
            <?
        
        
       for($i=0;$i<count($foundationList);$i++){
           $temp=$foundationList[$i];//get the foundation object from array
           
           //store the object to separate variable
           $foundationID =  $temp->getFoundationID();
           $password =  $temp->getPassword();
           $name =  $temp->getName();
           $photo = $temp->getPhoto();
           $address = $temp->getAddress();
           $city = $temp->getCity();
           $state = $temp->getState();
           $country = $temp->getCountry();
           $postalCode  = $temp->getPostalCode();
           $accountNo = $temp->getAccountNo();
           $phone = $temp->getPhone();
           $description = $temp->getDescription();
           if($description==""|$description==null)$description="-";
           
           ?>
               <tr>
                   <td><?php echo $foundationID;?></td>                    
                   <!--<td><?php echo $password;?></td>--> 
                   <td align="center"><img src="<?php echo "../Database/Images/Foundation/".$photo;?>" width="30"height="30"/></td> 
                   <td><?php echo $name;?></td> 
                   <td><?php echo $address;?></td> 
                   <td><?php echo $city;?></td> 
                   <td><?php echo $state;?></td> 
                   <td align="center"><?echo $country;?></td> 
                   <td><?php echo $accountNo;?></td> 
                   <td align="right"><?php echo $phone;?></td> 
                   <td align="center"><?php echo $description;?></td> 
                   <td align="center">
                        <form action="FoundationCtrl.php" method="post">
                            <input type="hidden" name="action" value="foundationprofile">
                            <input type="hidden" name="foundationSelectedID" value="<? echo $foundationID ?>">
                            <input type="submit" value="View Profile">
                        </form>
                   </td>
               </tr>
               
               <?
       }
        ?>
               </table><br>
        <?}
        else
        {
            echo 'Foundation Not Avaiable<br>';
        }
        
        
        }
        else if($_SESSION['searchpeopleresult'] == "0")
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
