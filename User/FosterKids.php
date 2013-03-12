<?
session_start();
include 'Kids.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
         <script type="text/javascript">
        function no()
        {
            window.location.href='KidsList.php';
        }
        </script>
    </head>
    <body>
        <? include 'UserHeader.php' ?>
        <hr>
       <form action='KidsCtrl.php' method="post">
            			<input type="hidden" name="action" value="fosterKid">
                                 <?
							
                                    $kidsData = new Kids(
                                            unserialize($_SESSION['kidsdataobj'])->getKidsID(),
                                            unserialize($_SESSION['kidsdataobj'])->getName(),
                                            unserialize($_SESSION['kidsdataobj'])->getPhoto(),
                                            unserialize($_SESSION['kidsdataobj'])->getDOB(),
                                            unserialize($_SESSION['kidsdataobj'])->getBackground(),
                                            unserialize($_SESSION['kidsdataobj'])->getRegion(),
                                            unserialize($_SESSION['kidsdataobj'])->getOrigin(),
                                            unserialize($_SESSION['kidsdataobj'])->getAspiration(),
                                            unserialize($_SESSION['kidsdataobj'])->getHealth(),
                                            unserialize($_SESSION['kidsdataobj'])->getEducation(),
                                            unserialize($_SESSION['kidsdataobj'])->getNutrition(),
                                            unserialize($_SESSION['kidsdataobj'])->getFoundationID(),
                                            unserialize($_SESSION['kidsdataobj'])->getKidsIDinFoundation()
                                            );

                                ?>  
                                <br/><br/>
                                <table frame="box" style="solid" width="848px"><!-- TABLE AFTER FIRST TABLE -->
                                    <tr>
                                        <td valign="top" frame="box"align="center" rowspan="7" width="200px">
                                            <img width="100%"src="../Database/Images/Kids/<?echo $kidsData->getPhoto()?>" alt="<?$kidsData->getName()?>"/>
                                            
                                            <input type="submit" value="Yes"><input type="button" value="No" onclick="no()"><br/>
                                            
                                        </td>
                                        <td width="100px">Kids ID</td>
                                        <td width="5px">:</td>      
                                        <input type="hidden" name="kidsSelected" value="<? echo $kidsData->getKidsID() ?>">
                                        <td><input type="hidden" name="kidsID" value="<? echo $kidsData->getKidsID() ?>"><? echo $kidsData->getKidsID() ?></td>
                                    </tr>
                                    <tr>
                                        <td><input type="hidden" name="foundationID" value="<? echo $kidsData->getFoundationID() ?>">Foundation ID</td>
                                        <td>:</td>
                                        <td><? echo $kidsData->getFoundationID() ?></td>
                                    </tr>
                                    <tr>
                                        <td>Name</td>
                                        <td>:</td>
                                        <td><? echo $kidsData->getName() ?></td>
                                        
                                    </tr>
                                    <tr>
                                        <td>DOB</td>
                                        <td>:</td>
                                        <td><? echo $kidsData->getDOB() ?></td>
                                    </tr>
                                    <tr>
                                        <td>Region</td>
                                        <td>:</td>
                                        <td><? echo $kidsData->getRegion() ?></td>
                                    </tr>
                                    <tr>
                                       
                                        <td>Origin</td>
                                        <td>:</td>
                                        <td><? echo $kidsData->getOrigin() ?></td>
                                    </tr>
                                    <tr>
                                        
                                        <td>Aspiration</td>
                                        <td>:</td>
                                        <td><? echo $kidsData->getAspiration() ?></td>
                                    </tr>
                                    <tr>
                                        <td rowspan="2"align="center" valign="top">Are you sure want to foster this kid?</td>
                                        <td valign="top">Background</td>
                                        <td valign="top">:</td>
                                        <td valign="top"><? echo $kidsData->getBackground() ?></td>
                                    </tr>
                                    <tr>
                                        
                                        <td valign="top">Needs</td>
                                        <td valign="top">:</td>
                                        <td valign="top">
                                            <?
                                            if($kidsData->getHealth() == '1')
                                            {    
                                            ?>
                                                Health <br>
                                            <?
                                            }
                                            if($kidsData->getEducation() == '1')
                                            {    
                                            ?>
                                                Education <br>
                                            <?
                                            }
                                            if($kidsData->getNutrition() == '1')
                                            {    
                                            ?>
                                                Nutrition
                                            <?
                                            }
                                            ?> 
                                        </td>
                                    </tr>
                                    <tr>
                                        
                                    </tr>
                                    <tr>
                                        
                                        
                                        
                                    </tr>
                                    
                                </table><!-- END OF TABLE AFTER FIRST TABLE -->
                          </form>
    </body>
</html>
