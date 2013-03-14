<?session_start();
include "Kids.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <script>
        function deletekids(){
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
         <?include 'FoundationHeader.php'?>
       <hr>
        
        <?php
        $kidsList=  unserialize($_SESSION['kidslistdataobj']);
        
        if(count($kidsList)>0){
        ?>
            <table style="border:1px solid">
            <tr bgcolor="#c0c0c0">
                <td height="30px" style="min-width: 90px" valign="middle" align="center">Kids ID</td>                
                <td height="30px" style="min-width: 90px" valign="middle" align="center">Name</td>
                <td height="30px" style="min-width: 90px" valign="middle" align="center">Photo</td>
                <td height="30px" style="min-width: 90px" valign="middle" align="center">DOB</td>
                <td height="30px" style="min-width: 90px" valign="middle" align="center">Background</td>
                <td height="30px" style="min-width: 90px" valign="middle" align="center">Region</td>
                <td height="30px" style="min-width: 90px" valign="middle" align="center">Origin</td>
                <td height="30px" style="min-width: 90px" valign="middle" align="center">Aspiration</td>
<!--                <td height="30px" style="min-width: 90px" valign="middle" align="center">Health</td>
                <td height="30px" style="min-width: 90px" valign="middle" align="center">Education</td>
                <td height="30px" style="min-width: 90px" valign="middle" align="center">Nutrition</td>-->
                <!--<td height="30px" style="min-width: 90px" valign="middle" align="center">Foundation ID</td>-->
                 <td height="30px" style="min-width: 90px" valign="middle" align="center" colspan="2"></td>
                    
            </tr>
            
            <?
        
        
       for($i=0;$i<count($kidsList);$i++){
           $temp=$kidsList[$i];//get the kids object from array
           
           //store the object to separate variable
           $kidsID=$temp->getKidsID();
           $kidsIDinFoundation =  $temp->getKidsIDinFoundation();
           $name =  $temp->getName();
           $photo = $temp->getPhoto();
           $dob = $temp->getDOB();
           $background = $temp->getBackground();
           $region = $temp->getRegion();
           $origin = $temp->getOrigin();
           $aspiration  = $temp->getAspiration();
           //$foundationID=$temp->getFoundationID();
//           $heatlh = $temp->getHealth();
//           $education = $temp->getEducation();
//           $nutrition = $temp->getNutrition();
          // $foundationID = $temp->getFoundationID();
          // if($aspiration==""|$aspiration==null)$aspiration="-";
           
           ?>
               <tr>
                   <td><?echo $kidsIDinFoundation;?></td> 
                   <td><?echo $name;?></td> 
                   <td align="center"><img src="../Database/Images/Kids/<?echo $photo;?>" height="30px"/></td> 
                   <td><?echo $dob;?></td> 
                   <td><?echo $background;?></td> 
                   <td><?echo $region;?></td> 
                   <td><?echo $origin;?></td> 
                   <td><?echo $aspiration;?></td> 
                   <!--<td><?//echo $foundationID;?></td>--> 
                   <!--<td><?//echo $foundationID;?></td>-->
                    <td align="center">
                            <form action="KidsCtrl.php" method="post">
                                <input type="hidden" name="action" value="prepareeditkid">
                                <input type="hidden" name="kidSelected" value="<? echo $kidsID ?>">
                                <input type="submit" value="Edit">
                            </form>
                           
                        </td>
                        <td align="center">
                            
                            
                            <form action="KidsCtrl.php" method="post" onsubmit="return deletekids()">
                                <input type="hidden" name="action" value="deletefoundation">
                                <input type="hidden" name="kidSelected" value="<? echo $kidsID ?>">
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
