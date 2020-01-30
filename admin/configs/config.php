<?php
$dbhost = "remotemysql.com";
$dbuser = "raIOA7PwdR";
$dbpass = "BK0YqyR7n4";
$dbname = "raIOA7PwdR";
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (!$conn) {
    die("Connection failed: " );
}

//$password = sha1("admin");
//$conn->query( "INSERT INTO staff (name, password,role)
//VALUES ('admin', '$password','admin')" );
?>