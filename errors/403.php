<?php 

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ошибка доступа</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(135deg, #e53e3e, #9b2c2c);
            color: #fff;
            text-align: center;
        }
        .error-container {
            max-width: 500px;
            padding: 30px;
            background: rgba(0, 0, 0, 0.6);
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        }
        .error-container h1 {
            font-size: 64px;
            margin: 0 0 20px;
            color: #fed7d7;
        }
        .error-container h2 {
            font-size: 24px;
            margin: 0 0 20px;
            color: #fff5f5;
        }
        .error-container p {
            font-size: 16px;
            margin: 0 0 30px;
            color: #ffe4e4;
        }
        .buttons {
            display: flex;
            gap: 10px;
            justify-content: center;
        }
        .button {
            padding: 12px 20px;
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            background-color: #4a5568;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s, transform 0.2s;
        }
        .button:hover {
            background-color: #2d3748;
            transform: translateY(-3px);
        }
        .button:active {
            transform: translateY(0);
        }
    </style>
</head>
<body>
    <div class="error-container">
        <h1>403</h1>
        <h2>Доступ запрещен</h2>
        <p>У вас нет доступа к этой странице. Возможно, вы не подтвердитили почту<br><span style="font-size:85%">(Это можно сделать на странице аккаунта)</span>.</p>
        <div class="buttons">
            <a href="/jshelper/" class="button">На главную</a>
            <a href="/jshelper/auth/login.php" class="button">Войти</a>
        </div>
    </div>
</body>
</html>
