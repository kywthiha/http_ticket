<?php
session_start();
$name = $_POST['name'];
$password = $_POST['password'];
if($name == "admin" and $password == "http") {
$_SESSION['auth'] = true;
header("location: /http_ticket/admin/schedule/schedule_list.php");
} else {
header("location: /http_ticket/admin/index.php");
}
?>