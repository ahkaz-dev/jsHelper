<style>
        .container {
            display: flex;
            margin: 55px;
            justify-content: space-between;
            padding: 20;
        }
        .cell {
            border: 1px solid #ccc;
            padding: 20px;
            width: 45%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .cell h2 {
            margin-top: 0;
        }
        .cell p {
            margin: 10px 0;
        }
        .cell a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .cell a:hover {
            background-color: #0056b3;
        }
</style>
<?php 
session_start();

if (!isset($_SESSION["auth-header"])) {
    require_once('\xampp\htdocs\jsHelper\errors\403.php');
} else if (isset($_SESSION["auth-header"])) {
    if ($_SESSION["auth-header"] == "Пользователь") {
        require_once('\xampp\htdocs\jsHelper\errors\403.php');
    } else if ($_SESSION["auth-header"] == "Админ") {?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Админ панель</title>
            <link rel="stylesheet" type="text/css" href="../static/css/account/account.css">
        </head>
<header class="top-bar">
      <span class="small-text"><a  target="_blank" href="https://www.php.net/"></a></span>
      <div class="menu">
        <button class="menu-btn">Помощь</button>
        <button class="menu-btn" onclick="location.href='http://localhost/jshelper/auth/account.php'">Аккаунт</button>
        <button class="menu-btn" onclick="location.href='http://localhost/jshelper/auth/logout.php'">Выход</button>
        <button class="menu-btn" id="up" onclick="location.href='http://localhost/jshelper'">
        <svg viewBox="0 0 16 16" width="20px" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M1 6V15H6V11C6 9.89543 6.89543 9 8 9C9.10457 9 10 9.89543 10 11V15H15V6L8 0L1 6Z" fill="#000000"></path> </g></svg>
        </button>
      </div>
</header> 
<div class="container">
        <div class="cell">
            <h2>Пользователи сайта</h2>
            <p>Таблица с пользователями, которые зарегистрировались на сайте</p>
            <a href="userView.php" class="btn">Подробнее</a>
        </div>
        <div class="cell">
            <h2>Пожелания сайта</h2>
            <p>Пожелания-сообщения из форма главной страницы</p>
            <a href="#" class="btn">Подробнее</a>
        </div>
    </div> 
</body>
</html>
<?php
    }
}