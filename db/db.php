<?php
date_default_timezone_set('Europe/Moscow');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($GLOBALS['pdo'])) {
    $host = 'localhost';
    $dbname = 'jshelper';
    $username = 'rootjs';
    $password = ']9gY/_MsYKexSbYW';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $GLOBALS['pdo'] = $pdo;
    } catch (PDOException $e) {
        echo "Ошибка подключения: " . $e->getMessage();
        die();
    }
} else {
    $pdo = $GLOBALS['pdo'];
}