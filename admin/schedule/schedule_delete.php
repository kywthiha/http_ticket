<?php
require_once('../configs/auth.php');
require_once('../configs/config.php');
$s_id = $_GET['s_id'];
$sql = "DELETE FROM schedule WHERE s_id = $s_id ";
mysqli_query($conn, $sql);
header("location:schedule_list.php");
?>