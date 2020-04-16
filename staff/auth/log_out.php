<?php
session_start();
unset($_SESSION['staff_auth'],$_SESSION['staff_staff'],$_SESSION['staff_password_change']);
header("location: /staff/");
?>