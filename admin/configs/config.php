<?php

$host = $_SERVER['SERVER_NAME'];
if ($host == 'localhost'){
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "http_ticket";
}else{
    $dbhost = "us-cdbr-east-06.cleardb.net";
    $dbuser = "bee42795583571";
    $dbpass = "4d4a9329";
    $dbname = "heroku_fb92eaed269e5d9";
}

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (!$conn) {
    die("Connection failed: " );
}

//$password = sha1("admin");
//$conn->query( "INSERT INTO staff (name, password,role)
//VALUES ('admin', '$password','admin')" );
?>