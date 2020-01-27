<?php
session_start();
unset($_SESSION['auth'],$_SESSION['staff'],$_SESSION['password_change']);
header("location: /http_ticket/admin/index.php");
?>