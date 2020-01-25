<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "http_ticket";
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (!$conn) {
    die("Connection failed: " );
}
?>