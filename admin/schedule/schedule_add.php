<?php
require_once('../configs/auth.php');
require_once('../configs/config.php');
$route_id = $_POST['route_id'];
$bus_id = $_POST['bus_id'];
$departure_time = $_POST['departure_time'];
$arrival_time = $_POST['arrival_time'];
$price = $_POST['price'];
$sql = "INSERT INTO schedule( route_id, bus_id, departure_time, arrival_time, price) VALUES ('$route_id','$bus_id','$departure_time','$arrival_time','$price')";
mysqli_query($conn, $sql);
header("location:schedule_list.php");
?>