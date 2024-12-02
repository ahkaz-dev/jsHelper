<?php 
session_start();

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
            <button class="menu-btn" onclick="location.href='http://localhost/jshelper'">Главная</button>
            <button class="menu-btn" onclick="location.href='#'">Уроки</button>
            <button class="menu-btn" onclick="location.href='logout.php'">Выход</button>
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
        <a href="service/confirmemail.php">Подтвердить почту</a>
    </div>
    </main>
    </body>
    </html>
<?php } else { ?>
    <a href="http://localhost/jshelper/auth/login.php">Войти</a>
    <a href="http://localhost/jshelper">Вернуться на главную</a>

    <p>Вы не авторизованы!</p>
<?php } ?>