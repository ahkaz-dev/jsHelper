<?php 
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Введение</title>
    <link rel="stylesheet" href="/jshelper/static/css/lessons/vedenie.css">
</head>
<body>
<header class="top-bar">
      <span class="small-text"><a  target="_blank" href="https://www.php.net/"></a></span>
      <div class="menu">
        <button class="menu-btn">Помощь</button>
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
    <a href="http://localhost/jshelper">Главная</a> → <a href="http://localhost/jshelper/lessons/lessons-hub.php">Уроки</a> → Введение
    </header>
    <div class="layout">
        <!-- Sidebar with anchors -->
        <div class="sidebar">
            <div class="sticky-div">
            <a class="anchor" href="#o-acnhor">Что такое JavaScript?</a><br><br>
            <a class="anchor" href="#s-acnhor">Чего не может JavaScript в браузере?</a><br><br>
            <a class="anchor" href="#t-acnhor">Что делает JavaScript особенным?</a><br><br>
            <a class="anchor" href="#f-acnhor">Итого</a><br><br>
            <hr>
            <a href="../authi/prod-vedenie.php">Продвинутый курс</a>
            </div>
        </div>
        <!-- Content -->
        <div class="content">
            <div style="text-align: end; font-size: 85%; opacity: 0.75;">12 мая 2024</div>
            <h1>Введение в JavaScript</h1>
            <div class="metadata">
                <div>Сложность: <span style="color: mediumseagreen;">Легко</span></div>
                <div>Время чтения: <span style="color: #f3b937;">15 минут</span></div>
            </div>
            <h2 id="o-acnhor">Что такое JavaScript?</h2>
            <p>JavaScript — это мощный язык программирования, который используется для создания интерактивных и динамических веб-страниц. Он является основным компонентом в веб-разработке, наряду с HTML и CSS.</p>
            
            <h2>Почему JavaScript так важен?</h2>
            <p>Изначально JavaScript был создан, чтобы «сделать веб-страницы живыми».</p>
            <p>Программы на этом языке называются скриптами. Они могут встраиваться в HTML и выполняться автоматически при загрузке веб-страницы.</p>
            <p>Скрипты распространяются и выполняются, как простой текст. Им не нужна специальная подготовка или компиляция для запуска.</p>
            <p>Это отличает JavaScript от другого языка — <a href="#">Java</a>.</p>

            <h2>Как начать использовать JavaScript?</h2>
            <p>Давайте рассмотрим первый простой пример JavaScript:</p>
            <pre><code>// Это комментарий
console.log("Привет, мир!");</code></pre>
            <p>Этот код выводит сообщение "Привет, мир!" в консоль браузера. Откройте консоль разработчика (F12 в большинстве браузеров), чтобы увидеть результат.</p>
            <p>Для добавления JavaScript на веб-страницу можно использовать тег <code>&lt;script&gt;</code>. Например:</p>
            <pre><code>&lt;!DOCTYPE html&gt;
&lt;html&gt;
&lt;head&gt;
    &lt;title&gt;Моя первая страница JavaScript&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;
    &lt;h1&gt;Привет, мир!&lt;/h1&gt;
    &lt;script&gt;
        console.log("Это мой первый скрипт!");
    &lt;/script&gt;
&lt;/body&gt;
&lt;/html&gt;</code></pre>
            <p>Сохраните этот код в файл с расширением <code>.html</code>, откройте его в браузере и запустите консоль, чтобы увидеть сообщение.</p>
            
            <h2 id="s-acnhor">Чего НЕ может JavaScript в браузере?</h2>
            <p>Возможности JavaScript в браузере ограничены ради безопасности пользователя. Цель заключается в предотвращении доступа недобросовестной веб-страницы к личной информации или нанесения ущерба данным пользователя.</p>
            <p>Примеры таких ограничений включают в себя:</p>
            <p>JavaScript на веб-странице не может читать/записывать произвольные файлы на жёстком диске, копировать их или запускать программы. Он не имеет прямого доступа к системным функциям ОС.
            Современные браузеры позволяют ему работать с файлами, но с ограниченным доступом, и предоставляют его, только если пользователь выполняет определённые действия, такие как «перетаскивание» файла в окно браузера или его выбор с помощью тега <code>input</code>.</p>
            <p>Различные окна/вкладки не знают друг о друге. Иногда одно окно, используя JavaScript, открывает другое окно. Но даже в этом случае JavaScript с одной страницы не имеет доступа к другой, если они пришли с разных сайтов (с другого домена, протокола или порта).
            Это называется «Политика одинакового источника» (Same Origin Policy). Чтобы обойти это ограничение, обе страницы должны согласиться с этим и содержать JavaScript-код, который специальным образом обменивается данными.</p>


            <h2 id="t-acnhor">Что делает JavaScript особенным?</h2>
            <p>Как минимум, три сильные стороны JavaScript:</p>
            <ol style="list-style-type: disc;" class="end-li">
            <li>Полная интеграция с HTML/CSS.</li>
            <li>Простые вещи делаются просто.</li>
            <li>Поддерживается всеми основными браузерами и включён по умолчанию.</li>
            </ol>
            <p>JavaScript – это единственная браузерная технология, сочетающая в себе все эти три вещи.</p>
            <p>Вот что делает JavaScript особенным. Вот почему это самый распространённый инструмент для создания интерфейсов в браузере.</p>
            <p>Хотя, конечно, JavaScript позволяет делать приложения не только в браузерах, но и на сервере, на мобильных устройствах и т.п.</p>

            <h2 id="f-acnhor">Итого</h2>
            <ol style="list-style-type: disc;" class="end-li">
            <li>JavaScript изначально создавался только для браузера, но сейчас используется на многих других платформах.</li>
            <li>Сегодня JavaScript занимает уникальную позицию в качестве самого распространённого языка для браузера, обладающего полной интеграцией с HTML/CSS.
            </li>
            <li>Многие языки могут быть «транспилированы» в JavaScript для предоставления дополнительных функций. Рекомендуется хотя бы кратко рассмотреть их после освоения JavaScript.
            </li>
            </ol>
</div>
    </div>
</body>
</html>