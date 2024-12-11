<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Уроки - Учебник JavaScript</title>
    <link rel="stylesheet" href="/jshelper/static/css/lessons/vedenie.css">
    <style>
        /* Общие стили */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }
        header {
            background-color: #2d3748;
            color: #fff;
            padding: 20px;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
        }
        main {
            max-width: 1200px;
            margin: 30px auto;
            padding: 0 20px;
        }
        .lesson-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }
        .lesson-card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .lesson-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
        }
        .lesson-card h3 {
            font-size: 20px;
            margin: 0;
            padding: 20px;
            background-color: #4a5568;
            color: #fff;
        }
        .lesson-card p {
            padding: 15px 20px;
            font-size: 14px;
            color: #666;
            line-height: 1.5;
        }
        .lesson-card a {
            display: block;
            text-align: center;
            padding: 15px 20px;
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            background-color: #2b6cb0;
            text-decoration: none;
            transition: background-color 0.2s;
        }
        .lesson-card a:hover {
            background-color: #2c5282;
        }
        footer {
            text-align: center;
            margin: 30px 0;
            font-size: 14px;
            color: #aaa;
        }
        .button-table-line {
            justify-content: space-between;
            display: flex;
        }
    </style>
</head>
<body>
<header class="top-bar">
      <span class="small-text"><a  target="_blank" href="https://www.php.net/"></a></span>
      <div class="menu">
        <button class="menu-btn" onclick="location.href='http://localhost/jshelper/help.php'">Помощь</button>
        <?php 
        if(!isset($_SESSION["auth-header-login"])) {
          ?>
          <button class="menu-btn" onclick="location.href='http://localhost/jshelper/auth/login.php'">Войти</button>
        <?php
        } else {
          ?>
          <button class="menu-btn" onclick="location.href='http://localhost/jshelper/auth/account.php'">Аккаунт</button>
          <button class="menu-btn" onclick="location.href='http://localhost/jshelper/auth/logout.php'">Выход</button>
        <?php
        }
        ?>
        <button class="menu-btn" id="up" onclick="location.href='http://localhost/jshelper'">
        <svg viewBox="0 0 16 16" width="20px" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M1 6V15H6V11C6 9.89543 6.89543 9 8 9C9.10457 9 10 9.89543 10 11V15H15V6L8 0L1 6Z" fill="#000000"></path> </g></svg>
        </button>
      </div>
</header>
    <main>
        <div class="lesson-grid">
            <!-- Карточка урока -->
            <div class="lesson-card">
                <h3>Введение</h3>
                <p>Изучите основы JavaScript: что это за язык, где он используется и как начать писать свой первый код.</p>
                <?php 
                if (isset($_SESSION["auth-header-login"])) { ?>
                <div class="button-table-line">
                    <a href="/jshelper/lessons/noauth/vedenie.php">Обычный курс</a>
                    <a href="/jshelper/lessons/authi/prod-vedenie.php">Продвинутый курс</a>
                </div>
                <?php } else { ?>
                    <a href="/jshelper/lessons/noauth/vedenie.php">Обычный курс</a>
                <?php } ?>
                </div>
            <div class="lesson-card">
                <h3>Основы JavaScript</h3>
                <p>Базовы понятия и термины, которые требуются для начала работы с JavaScript.</p>
                <a href="/jshelper/lessons/noauth/osnov-js.php">Обычный курс</a>
            </div>    
            <div class="lesson-card">
                <h3>Переменные</h3>
                <p>Научитесь объявлять переменные, узнаете об их особенностях в JavaScript.</p>
                <?php 
                if (isset($_SESSION["auth-header-login"])) { ?>
                <div class="button-table-line">
                    <a href="/jshelper/lessons/noauth/peremenie.php">Обычный курс</a>
                    <a href="/jshelper/lessons/authi/prod-peremenie.php">Продвинутый курс</a>
                </div>
                <?php } else { ?>
                    <a href="/jshelper/lessons/noauth/peremenie.php">Обычный курс</a>
                <?php } ?>
            </div>
            <div class="lesson-card">
                <h3>Функции</h3>
                <p>Погрузитесь в основы функций: что это такое, зачем они нужны и как их использовать.</p>
                <a href="\jsHelper\errors\404.php">Обычный курс</a>
            </div>
            <div class="lesson-card">
                <h3>Циклы</h3>
                <p>Изучите, как использовать циклы для выполнения повторяющихся операций в вашем коде.</p>
                <a href="\jsHelper\errors\404.php">Обычный курс</a>
            </div>
            <div class="lesson-card">
                <h3>Объекты</h3>
                <p>Узнайте, как работать с объектами, их свойствами и методами.</p>
                <a href="\jsHelper\errors\404.php">Обычный курс</a>
            </div>
            <div class="lesson-card">
                <h3>Массивы</h3>
                <p>Научитесь эффективно использовать массивы для хранения и обработки данных.</p>
                <a href="\jsHelper\errors\404.php">Обычный курс</a>
            </div>
        </div>
    </main>
</body>
</html>
