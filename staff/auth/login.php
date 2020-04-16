<?php
session_start();
$name = $_POST['name'];
$password = sha1($_POST['password']);
require_once "../../admin/configs/config.php";
$sql = "SELECT * FROM staff WHERE name='$name' AND password='$password'";
$result = mysqli_query($conn, $sql);
if ($row = mysqli_fetch_assoc($result)) {
    if ($row['role'] == "operator"){
        $_SESSION['staff_auth'] = true;
        $_SESSION['staff_staff'] = $row;
        header("location: /staff/select_schedule.php");
    }
    else{
        die("Un authorize access");
    }

} else {
    $_SESSION['staff_auth_fail'] = true;
    header("location: /staff/index.php");
}

?>