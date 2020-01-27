<?php
require_once('../configs/auth.php');
require_once('../configs/config.php');
require_once "../auth/admin_check_role.php";
$staff_id = $_GET['staff_id'];
$sql = "DELETE FROM staff WHERE id = $staff_id ";
mysqli_query($conn, $sql);
header("location:staff_list.php");
?>