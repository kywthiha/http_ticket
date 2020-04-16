<?php

function getRole()
{
    if (isset($_SESSION['staff_auth'], $_SESSION['staff_staff'])) {
        return $_SESSION['staff_staff']['role'];
    } else {
        header("location:/staff/");
        exit();
    }
}
if(getRole() != "operator"){
    header("location:/staff/");
    exit();
}
?>