<?php
require_once('../configs/config.php');
$c_id = $_GET['c_id'];
$result = mysqli_query($conn, "SELECT * FROM city WHERE c_id = $c_id");
$row = mysqli_fetch_assoc($result);
if ($row){
    echo json_encode($row);
}