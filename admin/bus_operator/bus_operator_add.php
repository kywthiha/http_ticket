<?php
require_once('../configs/auth.php');
require_once('../configs/config.php');
$bus_operator_name = $_POST['bus_operator_name'];
$email = $_POST['email'];
$phone_no = $_POST['phone_no'];
$sql = "INSERT INTO bus_operator(bus_operator_name, email, phone_no) VALUES ('$bus_operator_name','$email','$phone_no')";
mysqli_query($conn, $sql);
header("location:bus_operator_list.php");
?>