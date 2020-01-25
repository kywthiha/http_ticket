<?php
require_once('../configs/auth.php');
require_once('../configs/config.php');
$locations = array();
$route_title = $_POST['route_title'];
$latest_id = 0;
$sql = "INSERT INTO route (title) VALUES ('$route_title')";
if (mysqli_query($conn, $sql)) { 
    $latest_id =  mysqli_insert_id($conn);    
  } 
$location_counter = 1;
foreach($_POST as $key => $value){
    if (substr( $key, 0, 4 ) === "loc_" && $latest_id != 0){
        $sql = "INSERT INTO route_detail ( route_id, location, city_id) VALUES ('$latest_id', $location_counter, '$value')";
        mysqli_query($conn, $sql);
        $location_counter++;
    }
}
header("location:route_list.php");
?>