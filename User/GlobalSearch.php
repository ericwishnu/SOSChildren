
<script>
    function validatesearch() {
        var x = document.forms["globalsearch"]["keyword"].value;

        if (x === null || x === "") {
            return false;
        }

    }
</script>
<form name="globalsearch" id="globalsearch" action="PeopleCtrl.php" method="post" class="form-search" onsubmit="return validatesearch()">
    <input type="hidden" name="action" value="globalsearchpeople">

    <input type="text" name="keyword" id="keyword" class="input-medium search-query">
    <input type="submit" value="Search" class="btn">
    <br>
    <br>
</form>

