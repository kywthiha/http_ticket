<?php
require_once('../configs/auth.php');
require_once('../configs/config.php');
require_once "../auth/standard_check_role.php";
$r_id = $_GET['r_id'];
$sql = "DELETE FROM route WHERE r_id = $r_id ";
mysqli_query($conn, $sql);
header("location:route_list.php");
?>