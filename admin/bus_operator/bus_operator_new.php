<?php 
$title = "New Bus Operator";
include('../header.php');?>
<?php
require_once('../configs/auth.php');
?>
    <h1>New Bus Operator</h1>
    <form action="bus_operator_add.php" method="post">
    <label for="bus_operator_name">Name:</label>
    <input type="text" name="bus_operator_name" required><br>
    <label for="email">Email:</label>
    <input type="email" name="email" id="" required><br>
    <label for="phone_no">Phone no:</label>
    <input type="tel" name="phone_no" id="" required><br>
    <input type="submit" value="Add Operator">
    </form>
<?php include('../footer.php')?>