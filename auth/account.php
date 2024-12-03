<?php 
session_start();
require_once './service/userlogger.php';


if (isset($_SESSION["auth-header-login"])) { ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Мой аккаунт</title>
        <link rel="stylesheet" type="text/css" href="../static/css/account/account.css">
    </head>
    <body>
    <header class="top-bar">
          <span class="small-text"><a  target="_blank" href="https://www.php.net/"></a></span>
          <div class="menu">
            <button class="menu-btn" onclick="location.href='http://localhost/jshelper/lessons/lessons-hub.php'">Уроки</button>
            <button class="menu-btn" onclick="location.href='logout.php'">Выход</button>
            <button class="menu-btn" id="up" onclick="location.href='http://localhost/jshelper'">
                <svg viewBox="0 0 16 16" width="20px" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M1 6V15H6V11C6 9.89543 6.89543 9 8 9C9.10457 9 10 9.89543 10 11V15H15V6L8 0L1 6Z" fill="#000000"></path> </g></svg>
            </button>  
        </div>
    </header>
    <main>
    <div class="user-info">
        <h2>Информация о пользователе</h2>
        <table>
            <tr>
                <th colspan="2">Данные входа</th>
            </tr>
            <tr>
                <td><strong>Последний вход:</strong></td>
                <td><?= $_SESSION["auth-header-time"]; ?></td>
            </tr>
        </table>
        <table>
            <tr>
                <th colspan="2">Данные аккаунта</th>
            </tr>
            <tr>
                <td><strong>Логин:</strong></td>
                <td><?= $_SESSION["auth-header-login"]; ?></td>
            </tr>
            <tr>
                <td><strong>Почта:</strong></td>
                <td><?= $_SESSION["auth-header-mail"]; ?></td>
            </tr>
            <tr>
                <td><strong>Пароль:</strong></td>
                <td><?= $_SESSION["auth-header-pass"]; ?></td>
            </tr>
            <tr>
                <td><strong>Статус аккаунта:</strong></td>
                <td><?= $_SESSION["auth-header-role"]; ?></td>
            </tr>
        </table>
        <p>Действия с аккаунтом:</p>
        <a href="service/updatepassword.php">Обновить пароль</a>
        <br><br>
        <?php 
        if (strcasecmp($_SESSION["auth-header-role"], "Пользователь") === 0) { ?>
            <a href="service/confirmaccount.php">Подтвердить аккаунт</a>
        <?php } else {?>
            <a href="service/confirmaccount.php" style="pointer-events:none;cursor:default;opacity: 0.6;color:grey;text-decoration:none;">Подтвердить аккаунт</a>
        <?php }?>
    </div>
    </main>
    </body>
    </html>
<?php } else { ?>
    <a href="http://localhost/jshelper/auth/login.php">Войти</a>
    <a href="http://localhost/jshelper">Вернуться на главную</a>

    <p>Вы не авторизованы!</p>
<?php } ?>