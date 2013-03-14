<?php
include 'PostData.php';

$postlist = unserialize($_SESSION['postlistdataobj']);

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
        <table style="border:1px solid" >
            <tr>
                <td><p style="float:left"><?php echo $name; ?></p>
                    <? if ($_SESSION['usernameU'] == $userID) { ?>
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
                    <td bgcolor="c0c0c0" valign="middle" style="width:300px">
                <center><img style=" max-height:150px;"  src='../Database/Images/Sponsor/<?php echo $photo; ?>'/>

                </center>
            </td>

            </tr>
        <? } ?>
        <tr >
            <td bgcolor="c0c0c0" valign="middle" style="width:300px">
                <?php echo $postcontent; ?>
            </td>
        </tr>

        <tr>
            <td align="right"> <font size="2"><?php echo $datetime; ?></font></td>
        </tr>


        </table>
    <? } ?>
    <br/>
    <?
} else {
    echo 'No Post Available';
}
?>
