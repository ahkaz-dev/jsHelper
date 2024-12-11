<?php 
session_start();

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Помощь</title>
    <link rel="stylesheet" href="/jshelper/static/css/lessons/vedenie.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #2c3e50;
        }

        .faq-item {
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            overflow: hidden;
        }

        .faq-header {
            background: #3498db;
            color: #fff;
            padding: 15px;
            cursor: pointer;
            font-size: 18px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .faq-header:hover {
            background: #2980b9;
        }

        .faq-content {
            padding: 15px;
            font-size: 16px;
            background-color: #f9f9f9;
        }

        .toggle-icon {
            font-size: 20px;
        }
    </style>
</head>
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
<body>
    <div class="container">
        <h1>Часто задаваемые вопросы</h1>
        <?php 
          if (isset($_SESSION["auth-header"])) {
            if ($_SESSION["auth-header-role"] == "Продвинутый" OR $_SESSION["auth-header-role"] == "Админ") { ?>
                <div class="faq-item">
                    <div class="faq-header">
                        <span>Как добавить данные?</span>
                        <span class="toggle-icon">+</span>
                    </div>
                    <div class="faq-content">
                        <p>Для добавление данных выполните следующие шаги:</p>
                        <ol>
                            <li>Перейдите на страницу "Аккаунт" и нажмите на кнопку "Админ-панель".</li>
                            <li>Выберите нужную категорию</li>
                            <li>Нажмите на кнопку "Добавить"</li>
                            <li>Заполните необходимые поля (логин, email, пароль).</li>
                            <li>Нажмите на кнопку.</li>
                        </ol>
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-header">
                        <span>Как редактировать данные?</span>
                        <span class="toggle-icon">+</span>
                    </div>
                    <div class="faq-content">
                        <p>Для редактирования данных выполните следующие шаги:</p>
                        <ol>
                            <li>Перейдите на страницу "Аккаунт" и нажмите на кнопку "Админ-панель".</li>
                            <li>Выберите нужную категорию</li>
                            <li>Нажмите на строку в таблице</li>
                            <li>Заполните необходимые поля (логин, email, пароль).</li>
                            <li>Нажмите на кнопку.</li>
                        </ol>
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-header">
                        <span>Как редактировать данные?</span>
                        <span class="toggle-icon">+</span>
                    </div>                
                    <div class="faq-content">
                        <p>Для удаления данных выполните следующие шаги:</p>
                        <ol>
                            <li>Перейдите на страницу "Аккаунт" и нажмите на кнопку "Админ-панель".</li>
                            <li>Выберите нужную категорию</li>
                            <li>Нажмите на "Удалить" в таблице</li>
                        </ol>
                    </div>
                </div>                
           <?php }
          }
        ?>        

        <div class="faq-item">
            <div class="faq-header">
                <span>Как зарегистрироваться на сайте?</span>
                <span class="toggle-icon">+</span>
            </div>
            <div class="faq-content">
                <p>Для регистрации на сайте выполните следующие шаги:</p>
                <ol>
                    <li>Перейдите на главную страницу и нажмите на кнопку "Вход".</li>
                    <li>Заполните необходимые поля (логин, email, пароль).</li>
                    <li>Нажмите на кнопку.</li>
                </ol>
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-header">
                <span>Как активировать аккаунт?</span>
                <span class="toggle-icon">+</span>
            </div>
            <div class="faq-content">
                <p>Если вы хотите получить доступ к продвинутым урокам:</p>
                <ol>
                    <li>На странице аккаунта нажмите "Подтвердить аккаунт".</li>
                    <li>Введите ваш email, с помощью капчи.</li>
                    <li>Нажмите на кнопку.</li>
                </ol>
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-header">
                <span>Как посмотреть уроки?</span>
                <span class="toggle-icon">+</span>
            </div>
            <div class="faq-content">
                <p>Для просмотра уроков:</p>
                <ul>
                    <li>Используйте унопку "Уроки".</li>
                    <li>Или перейдите по адресу <a href="http://localhost/jshelper/lessons/lessons-hub.php">Ссылка</a>.</li>
                </ul>
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-header">
                <span>Как связаться с поддержкой?</span>
                <span class="toggle-icon">+</span>
            </div>
            <div class="faq-content">
                <p>Вы можете связаться с нами через:</p>
                <ul>
                    <li>Email: <a href="mailto:support@example.com">support@jshelper.com</a></li>
                    <li>Телефон: <a href="tel:+1234567890">+1 (123) 456-7890</a></li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
