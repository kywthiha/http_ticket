<?php
require_once('../configs/auth.php');
require_once('../configs/config.php');
require_once "../auth/standard_check_role.php";
$c_name = $_POST['c_name'];
$sql = "INSERT INTO `city` ( `c_name`) VALUES ('$c_name')";
mysqli_query($conn, $sql);
header("location:city_list.php");
?>