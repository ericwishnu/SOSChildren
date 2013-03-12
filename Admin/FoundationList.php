<?php
session_start();
include 'Foundation.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <script>
        function deletefoundation(){
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
        
        
       <?php include 'AdminHeader.php'?>
        <hr>
        
        <?php
        $foundationList=  unserialize($_SESSION['foundationlistdataobj']);
        if(count($foundationList)>0){
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
            
            <?php
        
        
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
                                <input type="hidden" name="action" value="prepareeditfoundation">
                                <input type="hidden" name="foundationSelected" value="<? echo $foundationID ?>">
                                <input type="submit" value="Edit">
                            </form>
                           
                        </td>
                        <td align="center">
                            
                            
                            <form action="FoundationCtrl.php" method="post" onsubmit="return deletefoundation()">
                                <input type="hidden" name="action" value="deletefoundation">
                                <input type="hidden" name="foundationSelected" value="<? echo $foundationID ?>">
                                <input type="submit" value="Delete">
                            </form>
                        </td>
               </tr>
               
               <?php
       }
        ?>
               </table>
        <?php }
        else
        {
            echo 'Not Avaiable';
        }
       ?>
    </body>
</html>
