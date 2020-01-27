<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "http_ticket";
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (!$conn) {
    die("Connection failed: " );
}

//$password = sha1("admin");
//$conn->query( "INSERT INTO staff (name, password,role)
//VALUES ('admin', '$password','admin')" );
?>