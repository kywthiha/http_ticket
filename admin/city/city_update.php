<?php
require_once('../configs/auth.php');
require_once('../configs/config.php');
$c_id = $_POST['c_id'];
$c_name = $_POST['c_name'];
$sql = "UPDATE city SET c_name = '$c_name' WHERE c_id = '$c_id' ";
mysqli_query($conn, $sql);
header("location:city_list.php");
?>