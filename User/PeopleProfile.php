<?
session_start();
include 'User.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include 'UserHeader.php';
        ?>
        <hr>
        <?
        $userinfo = unserialize($_SESSION['peopledataobj']);
        $peopleID = $userinfo->getSponsorID();
        $photo = $userinfo->getPhoto();
        $email = $userinfo->getEmail();
        $name = $userinfo->getName();
        $address = $userinfo->getAddress();
        $city = $userinfo->getCity();
        $state = $userinfo->getState();
        $country = $userinfo->getCountry();
        $postalCode = $userinfo->getPostalCode();
        $phone = $userinfo->getPhone();
        $relationship = $_SESSION['relationship'];
        
        echo '<br><br>';
        
        if(isset($_SESSION['message']))
        {
            echo $_SESSION['message'];
        }
        
        ?>
        
        <table>
            <tr>
                <td>
                    <tr>
                        <td align="center">
                            <img height="80px"src="../Database/Images/Sponsor/<? echo $photo; ?>" /></br>
                        </td>
                        <td valign="middle"><? echo $peopleID ?></td>
                    </tr>
                </td>
            </tr>
        <table>
            <tr>
                <td>Email</td>
                <td><? echo $email; ?></td>
            </tr>
            <tr>
                <td>Name</td>
                <td><? echo $name; ?></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><? echo $address; ?></td>
            <tr>
                <td>City</td>
                <td><? echo $city; ?></td>
            </tr>
            <tr>
                <td>State</td>
                <td><? echo $state; ?></td>
            </tr>
            <tr>
                <td>Country</td>
                <td><? echo $country; ?></td>
            </tr>
            <tr>
                <td> Postal Code</td>
                <td><? echo $postalCode; ?></td>
            </tr>
            <tr>
                <td>Phone</td>
                <td><? echo $phone; ?></td>
            </tr>
            <tr>
                <td>Relationship</td>
                <td><? if ($relationship == null) { ?>
                    <form name="addneighbour" action="PeopleCtrl.php" method="post">
                        <input type="hidden" name="action" value="addneighbour">
                        <input type="hidden" name="peopleID" value="<? echo $peopleID ?>">
                        <a href="javascript: addneighbour()">Add Neighbor</a>
                        <script type="text/javascript">
                            function addneighbour()
                            {
                                document.addneighbour.submit();
                            }
                        </script>
                    </form>
                    <? } else if ($relationship == "Pending") { ?>
                    <form name="cancelrequest" action="PeopleCtrl.php" method="post">
                        <input type="hidden" name="action" value="removeneighbour">
                        <input type="hidden" name="peopleID" value="<? echo $peopleID ?>">
                        <a href="javascript: cancelrequest()">Cancel Request</a>
                        <script type="text/javascript">
                            function cancelrequest()
                            {
                                document.cancelrequest.submit();
                            }
                        </script>
                    </form>
                    <? } else { ?>
                    
                    <form name="editrelationship" action="PeopleCtrl.php" method="post">
                        <input type="hidden" name="action" value="editrelationship">
                        <input type="hidden" name="peopleID" value="<? echo $peopleID ?>">
                        <select name="relationship">
                            <?
                                $val1 = "";
                                $val2 = "";
                                $val3 = "";
                                $val4 = "";
                                                
                                if( $relationship=="Neighbour" ){ $val1 = "selected"; }
                                else if( $relationship=="Close Neighbour" ) { $val2 = "selected"; }
                                else if( $relationship=="Family House" ) { $val3 = "selected"; }
                                else if( $relationship=="Office Room" ) { $val4 = "selected"; }
                            ?>
                            
                            <option value="Neighbour" <?echo $val1 ?>>Regular Neighbor</option>
                            <option value="Close Neighbour" <?echo $val2 ?>>Close Neighbor</option>
                            <option value="Family House" <?echo $val3 ?>>Family House</option>
                            <option value="Office Room" <?echo $val4 ?>>Office Room</option>
                        </select>
                        <input type="submit" value="Save">
                    </form>
                    
                    <form name="removeneighbour" action="PeopleCtrl.php" method="post">
                        <input type="hidden" name="action" value="removeneighbour">
                        <input type="hidden" name="peopleID" value="<? echo $peopleID; ?>">
                        <a href="javascript: removeneighbour()">Delete Neighbor</a>
                        <script type="text/javascript">
                            function removeneighbour()
                            {
                                document.removeneighbour.submit();
                            }
                        </script>
                    </form>
                    
                    <? } ?>
                </td>
            </tr>
        </table>
            
        <? include 'PostList.php' ?>
    </body>
</html>
