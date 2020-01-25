<?php 
require_once('../configs/auth.php');
$title = "Edit City";
include('../header.php');
?>
<h1>Edit City</h1>
<?php
require_once("../configs/config.php");
$c_id = $_GET['c_id'];
$result = mysqli_query($conn, "SELECT * FROM city WHERE c_id = $c_id");
$row = mysqli_fetch_assoc($result);
?>
<form action="city_update.php" method="post">
<input type="hidden" name="c_id" value="<?php echo $row['c_id']?>">
<label for="city_name">City Name</label>
<input type="text" name="c_name" value="<?php echo $row['c_name']?>">
<input type="submit" value="Update City">
</form>
<?php include('../footer.php')?>