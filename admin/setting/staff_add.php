<?php
require_once "../configs/auth.php";
require_once "../configs/config.php";
require_once "../auth/admin_check_role.php";
if(isset($_POST['name'],$_POST['password'],$_POST['role'])){
    $name = $_POST['name'];
    $password = sha1($_POST['password']);
    $role = $_POST['role'];
    $staff_id = $_SESSION['staff']['id'];
    $sql = "";
    if($role == "operator"){
        if(!isset($_POST['bus_operator_id'])){
            die("Invalid Request");
        }else{
            $bus_operator_id = $_POST['bus_operator_id'];
            $sql = "INSERT INTO staff (name, password,role,operator_id,staff_id) VALUES ('$name', '$password','$role','$bus_operator_id','$staff_id')";
        }
    }
    else{
        $sql = "INSERT INTO staff (name, password,role,staff_id) VALUES ('$name', '$password','$role','$staff_id')";
    }
    if($result=mysqli_query($conn, $sql)){
        header("location:staff_list.php");
    }
}else{
    die("Invalid Request");
}

