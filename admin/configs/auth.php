<?php
session_start();
if(!isset($_SESSION['auth'])) {
header("location: /http_ticket/admin/index.php");
exit();
}

?>