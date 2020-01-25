<?php
require_once('../configs/auth.php');
require_once('../configs/config.php');
$s_id = $_POST['s_id'];
$route_id = $_POST['route_id'];
$bus_id = $_POST['bus_id'];
$departure_time = $_POST['departure_time'];
$arrival_time = $_POST['arrival_time'];
$price = $_POST['price'];
$sql = "UPDATE schedule SET route_id='$route_id',bus_id='$bus_id',departure_time='$departure_time',arrival_time='$arrival_time',price='$price' WHERE s_id = $s_id";
mysqli_query($conn, $sql);
header("location:schedule_list.php");
?>