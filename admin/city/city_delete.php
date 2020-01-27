<?php
require_once('../configs/auth.php');
require_once('../configs/config.php');
require_once "../auth/standard_check_role.php";
$c_id = $_GET['c_id'];
$sql = "DELETE FROM city WHERE c_id = $c_id ";
mysqli_query($conn, $sql);
header("location:city_list.php");
?>