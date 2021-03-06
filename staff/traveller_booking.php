<?php
session_start();
require_once "auth/staff_role_check.php";
if (!isset($_SESSION['user_data_http_love'],$_SESSION['ticket_data_http_love'],$_SESSION['ticket_ids_http_love'],$_SESSION['booking_id'],$_SESSION['payment_info_http_love'])) {
    die('unauthorized access');
}
if (!isset($_GET['traveller_name'],$_GET['traveller_gender'],$_GET['traveller_email'],$_GET['phone_no'])){
    die('Invalid Request');
}
$traveller_name = $_GET['traveller_name'];
$traveller_gender = $_GET['traveller_gender'];
$traveller_email = $_GET['traveller_email'];
$staff_id = $_SESSION['staff_staff']['id'];
$phone_no = $_GET['phone_no'];
$booking_id = $_SESSION['booking_id'];
if(!($traveller_name && $traveller_gender && $phone_no)){
    die("Invalid Request");
}
require_once "../admin/configs/config.php";
$sql_traveller = "INSERT INTO traveller(traveller_name, gender_id, email, phone_no) VALUES ('$traveller_name','$traveller_gender','$traveller_email','$phone_no')";
if(mysqli_query($conn, $sql_traveller)){
    $traveller_id = mysqli_insert_id($conn);
    $sql_booking = "UPDATE booking SET traveller_id='$traveller_id',staff_id ='$staff_id' ,status = 1 WHERE booking_id = '$booking_id'";
    if (mysqli_query($conn, $sql_booking)){
        $_SESSION['booking_status'] = 1;
        $_SESSION['traveller_id'] = $traveller_id;
        unset($_SESSION['user_data_http_love'],$_SESSION['ticket_data_http_love'],$_SESSION['ticket_ids_http_love']);
        header("location:staff_booking_success.php");
    }
    else{
        $_SESSION['booking_status'] = 0;
        header("location:travel_info.php");
    }
}
else{
    $_SESSION['booking_status'] = 0;
    header("location:travel_info.php");
}
