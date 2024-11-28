<?php 
session_start();

if (isset($_SESSION["auth-header-login"])) {
    unset($_SESSION["auth-header-login"]);
    unset($_SESSION["auth-header"]);
    header("Location: http://localhost/jshelper");  
}
?>