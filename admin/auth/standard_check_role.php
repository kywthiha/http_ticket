<?php
function getRole()
{
    if (isset($_SESSION['auth'], $_SESSION['staff'])) {
        return $_SESSION['staff']['role'];
    }else{
        die("Un authorise access");
    }
}
if(getRole() != "admin" && getRole() != "standard"){
    die("Un authorise access");
}