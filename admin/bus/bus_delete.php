<?php
require_once('../configs/auth.php');
require_once('../configs/config.php');
require_once "../auth/standard_check_role.php";
$bus_id = $_GET['bus_id'];
$sql = "DELETE FROM bus WHERE bus_id = $bus_id ";
mysqli_query($conn, $sql);
header("location:bus_list.php");
?>