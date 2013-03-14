<?php
echo "Welcome, ".$_SESSION['usernameU']."!";
?>
<br>

<form name="mainpage" action="UserCtrl.php" method="post">
    <input type="hidden" name="sponsorID" value="<?php echo $_SESSION['usernameU'];?>"/>
    <input type="hidden" name="action" value="mainpage">
    <a href="javascript: mainpage()">Main Page</a>
    <script type="text/javascript">
    function mainpage()
    {
        document.mainpage.submit();
    }
    </script>
</form>


<form name="profile" action="UserCtrl.php" method="post">
    <input type="hidden" name="action" value="viewprofile">
    <a href="javascript: profile()">Profile</a>
    <script type="text/javascript">
    function profile()
    {
        document.profile.submit();
    }
    </script>
</form>


<form name="listkids" action="KidsCtrl.php" method="post">
    <input type="hidden" name="action" value="listkids">
    <a href="javascript: listkids()">Kids</a>
    <script type="text/javascript">
    function listkids()
    {
        document.listkids.submit();
    }
    </script>
</form>
<form name="listmykids" action="KidsCtrl.php" method="post">
    <input type="hidden" name="action" value="listmykids">
    <a href="javascript: listmykids()">My Kids</a>
    <script type="text/javascript">
    function listmykids()
    {
        document.listmykids.submit();
    }
    </script>
</form>

<!--<form name="settings" action="UserCtrl.php" method="post">
    <input type="hidden" name="action" value="settings">
    <a href="javascript: settings()">Settings</a>
    <script type="text/javascript">
    function settings()
    {
        document.settings.submit();
    }
    </script>
</form>-->
<form name="logout" action="UserCtrl.php" method="post">
    <input type="hidden" name="action" value="logout">
    <a href="javascript: logout()">Log Out</a>
    <script type="text/javascript">
    function logout()
    {
        document.logout.submit();
    }
    </script>
</form>
