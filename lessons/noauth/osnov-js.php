<?php 
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Основы JavaScript</title>
    <link rel="stylesheet" href="/jshelper/static/css/lessons/vedenie.css">
</head>
<body>
<header class="top-bar">
      <span class="small-text"><a  target="_blank" href="https://www.php.net/"></a></span>
      <div class="menu">
        <button class="menu-btn">Помощь</button>
        <button class="menu-btn" onclick="location.href='http://localhost/jshelper/lessons/lessons-hub.php'">Уроки</button>
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
    <header style="padding-left: 220px; margin-bottom: 20px;">
    <a href="http://localhost/jshelper">Главная</a> → <a href="http://localhost/jshelper/lessons/lessons-hub.php">Уроки</a> → Основы JavaScript
    </header>
    <div class="layout">
        <!-- Sidebar with anchors -->
        <div class="sidebar">
            <div class="sticky-div">
            <a class="anchor" href="#o-acnhor">Основы JavaScript</a><br><br>
            <a class="anchor" href="#s-acnhor">Встроенный JavaScript</a><br><br>
            <a class="anchor" href="#t-acnhor">Основные концепции JavaScript</a><br><br>
            <a class="anchor" href="#f-acnhor">Условия и циклы</a><br><br>
            <hr>
            <a href="../authi/prod-vedenie.php">Продвинутый курс</a>
            </div>
        </div>
        <!-- Content -->
        <div class="content">
            <div style="text-align: end; font-size: 85%; opacity: 0.75;">28 марта 2024</div>
            <h1>Основы JavaScript</h1>
            <div class="metadata">
                <div>Сложность: <span style="color: mediumseagreen;">Легко</span></div>
                <div>Время чтения: <span style="color: #f3b937;">15 минут</span></div>
            </div>
            <h2 id="o-acnhor">Основы JavaScript</h2>
    <p>JavaScript — это популярный язык программирования, который используется для создания интерактивных веб-страниц. Он работает вместе с HTML и CSS, чтобы сделать веб-сайты более динамичными и удобными для пользователей.</p>

    <h2">Почему JavaScript так важен?</h2>
    <p>JavaScript позволяет добавлять интерактивность на веб-страницы. С его помощью можно создавать анимации, обрабатывать события (например, нажатия кнопок), отправлять данные на сервер и многое другое. Это делает веб-сайты более живыми и удобными для пользователей.</p>

    <h2>Как начать использовать JavaScript?</h2>
    <p>Чтобы начать использовать JavaScript, нужно всего лишь добавить его код в HTML-документ. Это можно сделать несколькими способами:</p>
    <ol style="list-style-type: disc;" class="end-li">
        <li>Встроенный JavaScript: добавление кода непосредственно в HTML-документ.</li>
        <li>Внешний JavaScript: подключение отдельного файла с кодом JavaScript.</li>
    </ol>

    <h3 id="s-acnhor">Встроенный JavaScript</h3>
    <p>Встроенный JavaScript добавляется непосредственно в HTML-документ с помощью тега <code>&lt;script&gt;</code>.</p>
    <pre><code>&lt;!DOCTYPE html&gt;
&lt;html lang="ru"&gt;
&lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;meta name="viewport" content="width=device-width, initial-scale=1.0"&gt;
    &lt;title&gt;Пример встроенного JavaScript&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;
    &lt;h1&gt;Привет, мир!&lt;/h1&gt;
    &lt;script&gt;
        alert('Это встроенный JavaScript!');
    &lt;/script&gt;
&lt;/body&gt;
&lt;/html&gt;</code></pre>

    <h3>Внешний JavaScript</h3>
    <p>Внешний JavaScript подключается через отдельный файл с расширением <code>.js</code>. Это позволяет организовать код более структурированно и удобно.</p>
    <pre><code>&lt;!DOCTYPE html&gt;
&lt;html lang="ru"&gt;
&lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;meta name="viewport" content="width=device-width, initial-scale=1.0"&gt;
    &lt;title&gt;Пример внешнего JavaScript&lt;/title&gt;
    &lt;script src="script.js"&gt;&lt;/script&gt;
&lt;/head&gt;
&lt;body&gt;
    &lt;h1&gt;Привет, мир!&lt;/h1&gt;
&lt;/body&gt;
&lt;/html&gt;</code></pre>
    <p>Содержимое файла <code>script.js</code>:</p>
    <pre><code>alert('Это внешний JavaScript!');</code></pre>

    <h2 id="t-acnhor">Основные концепции JavaScript</h2>
    <p>JavaScript имеет несколько ключевых концепций, которые нужно понять, чтобы начать писать код:</p>
    <ol style="list-style-type: disc;" class="end-li">
        <li>Переменные и типы данных</li>
        <li>Операторы</li>
        <li>Функции</li>
        <li>Условия и циклы</li>
    </ol>

    <h3>Переменные и типы данных</h3>
    <p>Переменные используются для хранения данных. В JavaScript есть несколько типов данных, таких как числа, строки, булевы значения и объекты.</p>
    <pre><code>let name = 'Иван'; // строка
let age = 25; // число
let isStudent = true; // булево значение</code></pre>

    <h3>Операторы</h3>
    <p>Операторы используются для выполнения различных операций над переменными и значениями.</p>
    <pre><code>let sum = 5 + 3; // сложение
let difference = 10 - 4; // вычитание
let product = 2 * 6; // умножение
let quotient = 8 / 2; // деление</code></pre>

    <h3>Функции</h3>
    <p>Функции позволяют группировать код в блоки, которые можно вызывать многократно. Это помогает избежать дублирования кода и делает его более организованным.</p>
    <pre><code>function greet(name) {
    console.log('Привет, ' + name + '!');
}

greet('Мир');</code></pre>

    <h3 id="f-acnhor">Условия и циклы</h3>
    <p>Условия и циклы позволяют управлять потоком выполнения программы. Условия используются для выполнения кода в зависимости от определенных условий, а циклы — для повторения кода.</p>
    <pre><code>if (age &gt; 18) {
    console.log('Вы совершеннолетний.');
} else {
    console.log('Вы несовершеннолетний.');
}

for (let i = 0; i &lt; 5; i++) {
    console.log('Итерация ' + i);
}</code></pre>

</body>
</div>
    </div>
</body>
</html>