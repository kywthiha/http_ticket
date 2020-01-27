<?php

function getRole()
{
    if (isset($_SESSION['staff_auth'], $_SESSION['staff_staff'])) {
        return $_SESSION['staff_staff']['role'];
    } else {
        header("location:/http_ticket/staff/");
        exit();
    }
}
if(getRole() != "operator"){
    header("location:/http_ticket/staff/");
    exit();
}
?>