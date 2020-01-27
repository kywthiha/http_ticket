<?php
require_once('../configs/auth.php');
require_once('../configs/config.php');
require_once "../auth/standard_check_role.php";
$bus_id = $_POST['bus_id'];
$bus_operator_id = $_POST['bus_operator_id'];
$no_of_seat = $_POST['no_of_seat'];
$bus_type = $_POST['bus_type'];
$sql = "UPDATE bus SET bus_operator_id = '$bus_operator_id', no_of_seat=$no_of_seat,type='$bus_type' WHERE bus_id = '$bus_id'";
mysqli_query($conn, $sql);
header("location:bus_list.php");
?>