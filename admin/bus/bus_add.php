<?php
require_once('../configs/auth.php');
require_once('../configs/config.php');
$bus_operator_id = $_POST['bus_operator_id'];
$no_of_seat = $_POST['no_of_seat'];
$bus_type = $_POST['bus_type'];
$sql = "INSERT INTO bus(bus_operator_id, no_of_seat, type) VALUES ('$bus_operator_id','$no_of_seat','$bus_type')";
mysqli_query($conn, $sql);
header("location:bus_list.php");
?>