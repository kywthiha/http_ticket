<?php
require_once('../configs/auth.php');
require_once('../configs/config.php');
$bus_operator_id = $_POST['bus_operator_id'];
$bus_operator_name = $_POST['bus_operator_name'];
$email = $_POST['email'];
$phone_no = $_POST['phone_no'];
$sql = "UPDATE bus_operator SET bus_operator_name ='$bus_operator_name', email = '$email', phone_no = '$phone_no' WHERE bus_operator_id = '$bus_operator_id'";
mysqli_query($conn, $sql);
header("location:bus_operator_list.php");
?>