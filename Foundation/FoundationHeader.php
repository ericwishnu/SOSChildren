      <!-- HEADER -->
        <?php
        echo "Welcome, ".$_SESSION['usernameF']."!";
        
        ?>
        <form name="home" action="FoundationMainPage.php" method="post">
           
            <a href="javascript: home()">Home</a>
            <script type="text/javascript">
                function home()
                {
                    document.home.submit();
                }
            </script>
        </form>
      <form name="profile" action="FoundationCtrl.php" method="post">
          <input type="hidden" name="foundationid" value="<?echo $_SESSION['usernameF'];?>"/>
            <input type="hidden" name="action" value="profile"/>
            <a href="javascript: profile()">Profile</a>
            <script type="text/javascript">
                function profile()
                {
                    document.profile.submit();
                }
            </script>
        </form>
      <form name="prepareaddkids" action="KidsCtrl.php" method="post">
            <input type="hidden" name="foundationid" value="<?echo $_SESSION['usernameF'];?>"/>
           <input type="hidden" name="action" value="prepareaddkids"/>
           
            <a href="javascript: prepareaddkids()">Add Kids</a>
            <script type="text/javascript">
                function prepareaddkids()
                {
                    document.prepareaddkids.submit();
                }
            </script>
        </form>
        <form name="listkids" action="KidsCtrl.php" method="post">
            <input type="hidden" name="foundationid" value="<?echo $_SESSION['usernameF'];?>"/>
           <input type="hidden" name="action" value="listkids"/>
           
            <a href="javascript: listkids()">List Kids</a>
            <script type="text/javascript">
                function listkids()
                {
                    document.listkids.submit();
                }
            </script>
        </form>
        <form name="prepareSettings" action="FoundationCtrl.php" method="post">
           <input type="hidden" name="action" value="prepareSettings"/>
           
            <a href="javascript: prepareSettings()">Settings</a>
            <script type="text/javascript">
                function prepareSettings()
                {
                    document.prepareSettings.submit();
                }
            </script>
        </form>
        
         <form name="logout" action="FoundationCtrl.php" method="post">
            <input type="hidden" name="action" value="logout">
            <a href="javascript: logout()">Logout</a>
            <script type="text/javascript">
                function logout()
                {
                    document.logout.submit();
                }
            </script>
        </form>
         <!-- END HEADER -->