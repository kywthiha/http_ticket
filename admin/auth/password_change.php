<?php
$name = $_POST['name'];
$new_password = sha1($_POST['new_password']);
$old_password = sha1($_POST['old_password']);
require_once "../configs/config.php";
session_start();
$sql = "SELECT * FROM staff WHERE name='$name' AND password='$old_password'";
$result = mysqli_query($conn, $sql);
if ($row = mysqli_fetch_assoc($result)) {
    $sql = "UPDATE staff SET password ='$new_password' WHERE name='$name' AND password='$old_password'";
    $result = mysqli_query($conn, $sql);
    $_SESSION['password_change'] = 1;
    header("location: /admin/auth/log_out.php");
} else {
    $_SESSION['password_change'] = 2;
    header("location: /admin/setting/account.php");
}

?>
