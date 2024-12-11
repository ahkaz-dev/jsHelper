<?php 
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Перменные и типы данных</title>
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
    <a href="http://localhost/jshelper">Главная</a> → <a href="http://localhost/jshelper/lessons/lessons-hub.php">Уроки</a> → Перменные и типы данных
    </header>
    <div class="layout">
        <!-- Sidebar with anchors -->
        <div class="sidebar">
            <div class="sticky-div">
            <a class="anchor" href="#o-acnhor">Переменная?</a><br><br>
            <a class="anchor" href="#s-acnhor">Аналогия из жизни?</a><br><br>
            <a class="anchor" href="#t-acnhor">Константы?</a><br><br>
            <a class="anchor" href="#f-acnhor">Итого</a><br><br>
            <hr>
            <a href="../authi/prod-vedenie.php">Продвинутый курс</a>
            </div>
        </div>
        <!-- Content -->
        <div class="content">
            <div style="text-align: end; font-size: 85%; opacity: 0.75;">22 мая 2024</div>
            <h1>Перменные и типы данных</h1>
            <div class="metadata">
                <div>Сложность: <span style="color: orange;">Нормально</span></div>
                <div>Время чтения: <span style="color: #f3b937;">45 минут</span></div>
            </div>
            <h2 id="o-acnhor">Переменная?</h2>
            <p>Переменная – это «именованное хранилище» для данных. Мы можем использовать переменные для хранения товаров, посетителей и других данных.

Для создания переменной в JavaScript используйте ключевое слово let.

Приведённая ниже инструкция создаёт (другими словами, объявляет) переменную с именем «message»:
<pre><code>let message;</code></pre>

Теперь можно поместить в неё данные (другими словами, определить переменную), используя оператор присваивания =:
<pre><code>let message;

message = 'Hello'; // сохранить строку 'Hello' в переменной с именем message
</code></pre>
Строка сохраняется в области памяти, связанной с переменной. Мы можем получить к ней доступ, используя имя переменной:

<pre><code>let message;
message = 'Hello!';

alert(message); // показывает содержимое переменной</code></pre>

Для краткости можно совместить объявление переменной и запись данных в одну строку:
<pre><code>let message = 'Hello!'; // определяем переменную и присваиваем ей значение

alert(message); // Hello!</code></pre>

Мы также можем объявить несколько переменных в одной строке:
<pre><code>let user = 'John', age = 25, message = 'Hello';</code></pre>
Такой способ может показаться короче, но мы не рекомендуем его. Для лучшей читаемости объявляйте каждую переменную на новой строке.</p>


            <h2 id="s-acnhor">Аналогия из жизни?</h2>
            <p>Мы легко поймём концепцию «переменной», если представим её в виде «коробки» для данных с уникальным названием на ней.

Например, переменную message можно представить как коробку с названием "message" и значением "Hello!" внутри.:</p>
            <p>Мы можем положить любое значение в коробку.

Мы также можем изменить его столько раз, сколько захотим:</p>
<pre><code>let message;

message = 'Hello!';

message = 'World!'; // значение изменено

alert(message);</code></pre>
            <p>Мы также можем объявить две переменные и скопировать данные из одной в другую.</p>
<pre><code>let hello = 'Hello world!';

let message;

// копируем значение 'Hello world' из переменной hello в переменную message
message = hello;

// теперь две переменные содержат одинаковые данные
alert(hello); // Hello world!
alert(message); // Hello world!</code></pre>


            <h2 id="t-acnhor">Константы</h2>
            <p>Чтобы объявить константную, то есть, неизменяемую переменную, используйте const вместо let:

</p>
            <pre><code>const myBirthday = '18.04.1982';</code></pre>
            <p>Переменные, объявленные с помощью const, называются «константами». Их нельзя изменить. Попытка сделать это приведёт к ошибке:</p>
            <pre><code>const myBirthday = '18.04.1982';

myBirthday = '01.01.2001'; // ошибка, константу нельзя перезаписать!</code></pre>
            <p>Если программист уверен, что переменная никогда не будет меняться, он может гарантировать это и наглядно донести до каждого, объявив её через const.</p>

            <h3>Константы в верхнем регистре</h3>
            <p>Широко распространена практика использования констант в качестве псевдонимов для трудно запоминаемых значений, которые известны до начала исполнения скрипта.

Названия таких констант пишутся с использованием заглавных букв и подчёркивания.

Например, сделаем константы для различных цветов в «шестнадцатеричном формате»:</p>
<pre><code>const COLOR_RED = "#F00";
const COLOR_GREEN = "#0F0";
const COLOR_BLUE = "#00F";
const COLOR_ORANGE = "#FF7F00";

// ...когда нам нужно выбрать цвет
let color = COLOR_ORANGE;
alert(color); // #FF7F00</code></pre>
<p>Преимущества:

COLOR_ORANGE гораздо легче запомнить, чем "#FF7F00".
Гораздо легче допустить ошибку при вводе "#FF7F00", чем при вводе COLOR_ORANGE.
При чтении кода COLOR_ORANGE намного понятнее, чем #FF7F00.</p>


            
            <h2 id="f-acnhor">Итого</h2>
<p>Мы можем объявить переменные для хранения данных с помощью ключевых слов var, let или const.

</p>            <p>let – это современный способ объявления.
</p>
<p>var – это устаревший способ объявления. Обычно мы вообще не используем его, но мы рассмотрим тонкие отличия от let в главе Устаревшее ключевое слово "var" на случай, если это всё-таки вам понадобится.
</p>
<p>const – похоже на let, но значение переменной не может изменяться.
</p>
<p>Переменные должны быть названы таким образом, чтобы мы могли легко понять, что у них внутри.

</p>
</div>
    </div>
</body>
</html>