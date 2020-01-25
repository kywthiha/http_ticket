<?php 
$title = "Edit Bus Operator";
include('../header.php');?>
<h1>Edit Bus Operator</h1>
<?php
require_once('../configs/auth.php');
require_once("../configs/config.php");
$bus_operator_id = $_GET['bus_operator_id'];
$result = mysqli_query($conn, "SELECT * FROM bus_operator WHERE bus_operator_id = $bus_operator_id");
$row = mysqli_fetch_assoc($result);
?>
<form action="bus_operator_update.php" method="post">
<input type="hidden" name="bus_operator_id" value="<?php echo $row['bus_operator_id']?>">
<label for="bus_operator_name">Name:</label>
<input type="text" name="bus_operator_name" required value="<?php echo $row['bus_operator_name']?>"><br>
<label for="email">Email:</label>
<input type="email" name="email" id="" required value="<?php echo $row['email']?>"><br>
<label for="phone_no">Phone no:</label>
<input type="tel" name="phone_no" id="" required value="<?php echo $row['phone_no']?>"><br>
<input type="submit" value="Update Operator">
</form>
<?php include('../footer.php')?>