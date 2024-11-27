<?php
$host = 'localhost';
$user = 'rootjs'; 
$password = ']9gY/_MsYKexSbYW'; 
$database = 'jshelper'; 
$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Отсутствует подключение к БД: " . mysqli_connect_error());
} 
?>
