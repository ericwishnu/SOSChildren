<?php
session_start();
include 'Kids.php';
include 'Foundation.php';
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
                $("#dob").datepicker({
                    dateFormat: "yy-mm-dd",
                    changeMonth: true,
                    changeYear: true,
                    yearRange: "-100:+0"
                });
            });
        </script>   
    </head>
    <body>

        <? include 'AdminHeader.php' ?>

        <hr>



        <?
        $foundationList = unserialize($_SESSION['foundationdataobj']);
        $currentKid = unserialize($_SESSION['kiddataobj']);
        $kidsID = $currentKid->getKidsID();
        $foundationID = $currentKid->getFoundationID();
        $name = $currentKid->getName();
        $photo = $currentKid->getPhoto();
        $dob = $currentKid->getDOB();
        $background = $currentKid->getBackground();
        $region = $currentKid->getRegion();
        $origin = $currentKid->getOrigin();
        $aspiration = $currentKid->getAspiration();
        $health = $currentKid->getHealth();
        $education = $currentKid->getEducation();
        $nutrition = $currentKid->getNutrition();
        ?>
        <form name="preparechangepicture" action="KidsCtrl.php" method="post">
            <input type="hidden" name="action" value="preparechangepicture">
            <input type="hidden" name="id" value="<? echo $kidsID; ?>"/>
            <a href="javascript: preparechangepicture()">Change Picture</a>
            <script type="text/javascript">
                function preparechangepicture()
                {
                    document.preparechangepicture.submit();
                }
            </script>
        </form>

        <form id="form1" action="KidsCtrl.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="action" value="editkid"/>
            <input type="hidden" name="foundationid" value="<? echo $foundationID; ?>"/>
            <input type="hidden" name="kidid" value="<? echo $kidsID; ?>"/>

            <table >
                <tr>
                    <td align="center"><img src="../Database/Images/Kids/<? echo $photo; ?>" height="55px"/></td>
                    <td>&nbsp;&nbsp;&nbsp;<? echo "KidsID: " . $kidsID; ?></td>
                </tr>

                <tr>
                    <td>Name</td>
                    <td><input type="text" name="name" id="name" value="<? echo $name; ?>"/></td>
                </tr>
                <tr>
                    <td>Foundation </td>
                    <td>

                        <select name="foundationid">

                            <?
                            for ($i = 0; $i < count($foundationList); $i++) {
                                $temp = $foundationList[$i];
                                ?>
                                <option value="<? echo $temp->getFoundationID(); ?>" <? if ($temp->getFoundationID() == $foundationID) echo "selected" ?>><? echo $temp->getName(); ?></option>
                                <?
                            }
                            ?>

                        </select>
                    </td>
                </tr>
                <tr>
                    <td>DOB</td>
                    <td><input type="text" name="dob" id="dob" value="<? echo $dob; ?>"/></td>
                </tr>
                <tr>
                    <td>Background</td>
                    <td><input type="text" name="background" id="background" value="<? echo $background; ?>"/></td>
                </tr>
                <tr>
                    <td>Region</td>
                    <td><input type="text" name="region" id="region" value="<? echo $region; ?>"/></td>
                </tr>
                <tr>
                    <td>Origin</td>
                    <td><input type="text" name="origin" id="origin" value="<? echo $origin; ?>"/></td>
                </tr>
                <tr>
                    <td>Aspiration</td>
                    <td><input type="text" name="aspiration" id="aspiration" value="<? echo $aspiration; ?>"/></td>
                </tr>
                <tr>
                    <td valign="top">Needs</td>
                    <td>
                        <input type="checkbox" name="health" value="true" <? if ($health == 1) echo "checked"; ?>>Health <br>
                        <input type="checkbox" name="education" value="true" <? if ($education == 1) echo "checked"; ?>>Education <br>
                        <input type="checkbox" name="nutrition" value="true" <? if ($nutrition == 1) echo "checked"; ?>>Nutrition
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Submit" id="submit"/></td>
                </tr>
            </table>
        </form>
    </body>
</html>
