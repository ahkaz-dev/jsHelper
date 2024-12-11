<?php 
session_start();

if (isset($_SESSION["auth-header-login"])) {
    unset($_SESSION["auth-header-login"]);
    unset($_SESSION["auth-header"]);
    unset($_SESSION["auth-header-role"]);
    header("Location: http://localhost/jshelper");  
}
?>