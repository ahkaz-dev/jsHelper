<?php 
session_start();

if (!isset($_SESSION["auth-header"])) {
    echo "У вас нет доступа к данному курсу";
    echo "<br>";
} else if (isset($_SESSION["auth-header"])) {
    if ($_SESSION["auth-header"] == "Пользователь") {
        echo "Обовите роль доступа к курсам";
        echo "<br>Вы: {$_SESSION["auth-header"]}";

    } else if ($_SESSION["auth-header"] == "Продвинутый") {?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Продвинутое</title>
        </head>
        <body>
            <p>Курс</p>
        </body>
        </html>
    <?php
    }
}
?>
