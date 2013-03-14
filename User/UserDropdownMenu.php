<div class="btn-group"><!--DROPDOWN MENU-->



    <button class="btn btn-info dropdown-toggle" data-toggle="dropdown">
        <?php echo $userdata[0]; ?>
        <span class="caret"></span>
    </button>
    <ul class="dropdown-menu">
        <li class="list-drop">
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
        </li>
        <li class="list-drop">
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
        </li>

        <li class="divider"></li>
        <li class="list-drop">
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
        </li>
    </ul>
</div><!-- END DROPDOWN MENU-->