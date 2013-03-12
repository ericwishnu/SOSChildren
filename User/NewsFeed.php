<?php
include 'PostData.php';


$postlist = unserialize($_SESSION['newsfeeddataobj']);

if (count($postlist) > 0) {

    for ($i = 0; $i < count($postlist); $i++) {

        $temp = $postlist[$i]; //get the foundation object from array
//store the object to separate variable
        $usertype = $temp->getUserType();
        $userID = $temp->getUserID();
        $name = $temp->getName();
        $title = $temp->getTitle();
        $photo = $temp->getPhoto();
        $postcontent = $temp->getPostContent();
        $datetime = $temp->getDateTime();
        $userpostID = $temp->getUserPostID();
        ?>  
        <table style=" width: 100%;" >
            <tr>
                <td><div  style="float:left">
                        <?php
                        if ($usertype == "Sponsor") {
                            ?>
                            <form name="profile<? echo $i ?>" action="PeopleCtrl.php" method="post">
                                <input type="hidden" name="action" value="seepeopleprofile">
                                <input type="hidden" name="peopleSelectedID" value="<? echo $userID ?>">
                                <a href="javascript: profile<? echo $i ?>()"><? echo $name ?></a>
                                <script type="text/javascript">
                                    function profile<? echo $i ?>()
                                    {
                                        document.profile<? echo $i ?>.submit();
                                    }
                                </script>

                            </form>
                            <?php
                        } else if ($usertype == "Foundation") {
                            ?>  
                            <form name="foundation<? echo $i ?>" action="FoundationCtrl.php" method="post">
                                <input type="hidden" name="action" value="foundationprofile">
                                <input type="hidden" name="foundationSelectedID" value="<? echo $userID ?>">
                                <a href="javascript: foundation<? echo $i ?>()"><? echo $name ?></a>
                                <script type="text/javascript">
                                    function foundation<? echo $i ?>()
                                    {
                                        document.foundation<? echo $i ?>.submit();
                                    }
                                </script>

                            </form>
                        <? }
                        ?>
                    </div>
                    <? if ($_SESSION['usernameU'] == $userID) { //cek user bukan ?>
                        <form onsubmit="return deletepost();" action="UserCtrl.php" method="post">
                            <input type="hidden" name="action" value="deletepost"/>
                            <input type="hidden" name="usertype" value="<? echo $usertype ?>"/>
                            <input type="hidden" name="userid" value="<? echo $userID ?>"/>
                            <input type="hidden" name="postid" value="<? echo $userpostID; ?>"/>
                            <input style="float:right" type="submit" value="x"/>
                            <!--<a style="float:right" href="javascript: deletepost()">x</a>-->
                        </form>
                    <? } ?>
                </td>
            </tr>

            <? if ($photo != null || $photo != '') { ?>
                <tr>
                    <td valign="middle" style="width:300px">
                        <img style=" max-width:70%;max-height: 400px;"  src='../Database/Images/<?php echo $usertype . '/' . $photo; ?>'/>
                    </td>
                </tr>
            <? } ?>
            <tr>
                <td  valign="middle" style="width:300px">
                    <?php echo $postcontent; ?>
                </td>
            </tr>
            <tr>
                <td align="right"> <font size="2"><?php echo $datetime; ?></font>
                    <hr></td>

            </tr>


        </table>

    <? } ?>
    <br/>
    <?
} else {
    echo 'No Post Available';
}
?>