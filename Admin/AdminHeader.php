<!-- HEADER -->
<?
echo "Welcome, " . $_SESSION['usernameAdmin'] . "!";
?>
<form name="home" action="AdminMainPage.php" method="post">

    <a href="javascript: home()">Home</a>
    <script type="text/javascript">
        function home()
        {
            document.home.submit();
        }
    </script>
</form>
<br>
Admin
<form name="preaddadmin" action="AdminAdd.php" method="post">
    
    <a href="javascript: preaddadmin()">Add Admin</a>
    <script type="text/javascript">
        function preaddadmin()
        {
            document.preaddadmin.submit();
        }
    </script>
</form>
<form name="listadmin" action="AdminCtrl.php" method="post">
    <input type="hidden" name="action" value="listadmin">
    <a href="javascript: listadmin()">List Admin</a>
    <script type="text/javascript">
        function listadmin()
        {
            document.listadmin.submit();
        }
    </script>
</form>
<br>
Foundation
<form name="preaddfoundation" action="FoundationCtrl.php" method="post">
    <input type="hidden" name="action" value="preaddfoundation">
    <a href="javascript: preaddfoundation()">Add Foundation</a>
    <script type="text/javascript">
        function preaddfoundation()
        {
            document.preaddfoundation.submit();
        }
    </script>
</form>
<form name="listfoundation" action="FoundationCtrl.php" method="post">
    <input type="hidden" name="action" value="listfoundation">
    <a href="javascript: listfoundation()">List Foundation</a>
    <script type="text/javascript">
        function listfoundation()
        {
            document.listfoundation.submit();
        }
    </script>
</form>
<br>
Kids
<form name="preaddkid" action="KidsCtrl.php" method="post">
    <input type="hidden" name="action" value="preaddkid">
    <a href="javascript: preaddkid()">Add Kids</a>
    <script type="text/javascript">
        function preaddkid()
        {
            document.preaddkid.submit();
        }
    </script>
</form>

<form name="listkids" action="KidsCtrl.php" method="post">
    <input type="hidden" name="action" value="listkids">
    <a href="javascript: listkids()">List Kids</a>
    <script type="text/javascript">
        function listkids()
        {
            document.listkids.submit();
        }
    </script>
</form>
<br>

User
<form name="preadduser" action="UserCtrl.php" method="post">
    <input type="hidden" name="action" value="preadduser">
    <a href="javascript: preadduser()">Add User</a>
    <script type="text/javascript">
        function preadduser()
        {
            document.preadduser.submit();
        }
    </script>
</form>

<form name="listuser" action="UserCtrl.php" method="post">
    <input type="hidden" name="action" value="listuser">
    <a href="javascript: listuser()">List User</a>
    <script type="text/javascript">
        function listuser()
        {
            document.listuser.submit();
        }
    </script>
</form>
<br>

<form name="presettings" action="AdminCtrl.php" method="post">
    <input type="hidden" name="action" value="presettings">
    <a href="javascript: presettings()">Settings</a>
    <script type="text/javascript">
        function presettings()
        {
            document.presettings.submit();
        }
    </script>
</form>
<form name="logout" action="AdminCtrl.php" method="post">
    <input type="hidden" name="action" value="logout">
    <a href="javascript: logout()">Log Out</a>
    <script type="text/javascript">
        function logout()
        {
            document.logout.submit();
        }
    </script>
</form>

<!-- END HEADER -->
</body>