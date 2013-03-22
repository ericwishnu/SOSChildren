<div class="row-fluid">

    <form name="mainpage" action="UserCtrl.php" method="post"/>
    <input type="hidden" name="sponsorID" value="<?php echo $_SESSION['usernameU']; ?>"/>
    <input type="hidden" name="action" value="mainpage"/>
    <input type="submit" class="homeButton span12" id="home" name="name" value=""/>
</form>
</div>

<div class="row-fluid">



    <form name="listkids" action="KidsCtrl.php" method="post">
        <input type="hidden" name="action" value="listkids">
        <input type="submit" class="exploreButton span12" id="explore" name="explore" value=""/>

    </form>
</div>

<div class="row-fluid">
    <form action="PeopleCtrl.php" method="post">
        <input type="hidden" name="action" value="neighbourrequest"/>
        <input type="submit" class="notificationButton span12" id="notification" name="notification" value=""/>
    </form>
</div>

<div class="row-fluid">
    <form action="#" method="post">
        <input type="hidden" name="action" value="coins"/>
        <input type="submit" class="coinButton span12" id="coin" name="coin" value=""/>
    </form>
</div>

<div class="row-fluid" >
    <form action="PeopleCtrl.php" method="post">
        <input type="hidden" name="action" value="preparesearch"/>
        <input type="submit" class="searchButton span12" id="search" name="search" value=""/>
    </form>
</div>