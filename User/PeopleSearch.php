<form action="PeopleCtrl.php" method="post">
    <input type="hidden" name="action" value="searchpeople">
    Search
    <select name="searchby">
        <option value="Name" selected>Name</option>
        <option value="Username">Username</option>
        <option value="City">City</option>
        <option value="Country">Country</option>
    </select>
    <input type="text" name="keyword">
    <input type="submit" value="Search">
    <br>
    <br>
</form>
