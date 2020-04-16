<?php
session_start();
$name = $_POST['name'];
$password = sha1($_POST['password']);
require_once "../configs/config.php";
$sql = "SELECT * FROM staff WHERE name='$name' AND password='$password'";
$result = mysqli_query($conn, $sql);
if ($row = mysqli_fetch_assoc($result)) {
    $_SESSION['auth'] = true;
    $_SESSION['staff'] = $row;
    header("location: /admin/schedule/schedule_list.php");
} else {
    $_SESSION['auth_fail'] = true;
    header("location: /admin/index.php");
}

?>