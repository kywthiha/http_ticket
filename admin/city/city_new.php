<?php
require_once('../configs/auth.php');
require_once "../auth/standard_check_role.php";
$title = "New City";
include('../header.php');
?>
<h1>New City</h1>
<form action="city_add.php" method="post">
<label for="city_name">City Name</label>
<input type="text" name="c_name">
<input type="submit" value="Add City">
</form>
<?php include('../footer.php')?>