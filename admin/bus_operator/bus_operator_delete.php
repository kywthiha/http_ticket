<?php
require_once('../configs/auth.php');
require_once('../configs/config.php');
$bus_operator_id = $_GET['bus_operator_id'];
$sql = "DELETE FROM bus_operator WHERE bus_operator_id = $bus_operator_id ";
mysqli_query($conn, $sql);
header("location:bus_operator_list.php");
?>