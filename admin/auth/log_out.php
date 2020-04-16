<?php
session_start();
unset($_SESSION['auth'],$_SESSION['staff'],$_SESSION['password_change']);
header("location: /admin/index.php");
?>