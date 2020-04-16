<?php

$host = $_SERVER['SERVER_NAME'];
if ($host == 'localhost'){
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "http_ticket";
}else{
    $dbhost = "remotemysql.com";
    $dbuser = "bVcxl6XI8h";
    $dbpass = "uNO1STdL2R";
    $dbname = "bVcxl6XI8h";
}

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (!$conn) {
    die("Connection failed: " );
}

//$password = sha1("admin");
//$conn->query( "INSERT INTO staff (name, password,role)
//VALUES ('admin', '$password','admin')" );
?>