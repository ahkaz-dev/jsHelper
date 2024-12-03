<?php 
require_once '../db/db.php';

if (isset($_SESSION["auth-header-login"])) {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE Login=:login AND Password=:password");
    $stmt->execute(['login' => $_SESSION["auth-header-login"], 'password' => $_SESSION["auth-header-pass"]]);
    $userlogin = $stmt->fetch();
    
    if (!empty($userlogin)) {
        $_SESSION["auth-header"] = end($userlogin);
        $_SESSION["auth-header-login"] = $userlogin['Login'];
        $_SESSION["auth-header-mail"] = $userlogin['Email'];
        $_SESSION["auth-header-pass"] = $userlogin['Password'];
        $_SESSION["auth-header-role"] = $userlogin['UserRole'];
        $_SESSION["auth-header-id"] = $userlogin['UserId'];
    }
}

