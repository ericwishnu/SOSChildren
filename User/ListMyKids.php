<?
session_start();
include 'Kids.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <? include 'UserHeader.php' ?>
        <hr>
        <?
        $kids_list = unserialize($_SESSION['mykidslistdataobj']);

        if (!is_array($kids_list)) {
            echo "<p>No Kids currently available</p>";
        } else {
            ?>
            <table border="0" width="700px">
                <tr bgcolor="gray">
                    <th>Kids Name</th>
                    <th>Photo</th>
                    <th>Date of Birth</th>
                    <th>Age</th>
                    <th>Background</th>
                    <th>Region</th>
                    <th>Origin</th>
                    <th>Aspiration</th>
                    <th>Health</th>
                    <th>Education</th>
                    <th>Nutrition</th>
                    <th>Foundation</th>
                    <th></th>
                </tr>
                <?
                for ($i = 0; $i < sizeof($kids_list); $i++) {
                    $kidsID = $kids_list[$i]->getKidsId();
                    $name = $kids_list[$i]->getName();
                    $photo = $kids_list[$i]->getPhoto();
                    $DOB = $kids_list[$i]->getDOB();
                    $age = $kids_list[$i]->getAge();
                    $background = $kids_list[$i]->getBackground();
                    $region = $kids_list[$i]->getRegion();
                    $origin = $kids_list[$i]->getOrigin();
                    $aspiration = $kids_list[$i]->getAspiration();
                    $health = $kids_list[$i]->getHealth();
                    $education = $kids_list[$i]->getEducation();
                    $nutrition = $kids_list[$i]->getNutrition();
                    $foundationID = $kids_list[$i]->getFoundationID();
                    ?>
                    <tr bgcolor="#cccccc">
                        <td><? echo $name ?></td>
                        <td><? echo $photo ?></td>
                        <td><? echo $DOB ?></td>
                        <td><? echo $age ?></td>
                        <td><? echo $background ?></td>
                        <td><? echo $region ?></td>
                        <td><? echo $origin ?></td>
                        <td><? echo $aspiration ?></td>
                        <td><? echo $health ?></td>
                        <td><? echo $education ?></td>
                        <td><? echo $nutrition ?></td>
                        <td><? echo $foundationID ?></td>
                        <td>
                            <form action="KidsCtrl.php" method="POST">
                                <input type="hidden" name="action" value="kidsprofile"/>
                                <input type="hidden" name="kidsSelectedID" value="<?php echo $kidsID;?>"/>
                                <input type="submit" value="View Profile"/>
                            </form>
                        </td>
                    </tr>
        <?
    }
    ?>
            </table>
                <?
            }
            ?>
        <br>
    </td>
</tr>

</table>
</body>
</html>
