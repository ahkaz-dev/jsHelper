<?php 
session_start();

if (!isset($_SESSION["auth-header"])) {
    require_once('\xampp\htdocs\jsHelper\errors\403.php');
} else if (isset($_SESSION["auth-header"])) {
    if ($_SESSION["auth-header"] == "Пользователь") {
        // echo "Обовите роль доступа к курсам";
        // echo "<br>Вы: {$_SESSION["auth-header"]}";
        require_once('\xampp\htdocs\jsHelper\errors\403.php');
    } else if (($_SESSION["auth-header"] == "Продвинутый") OR ($_SESSION["auth-header"] == "Админ")) {?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Продвинутое</title>
            <link rel="stylesheet" href="/jshelper/static/css/lessons/vedenie.css">
        </head>
        <header class="top-bar">
      <span class="small-text"><a  target="_blank" href="https://www.php.net/"></a></span>
      <div class="menu">
        <button class="menu-btn">Помощь</button>
        <button class="menu-btn" onclick="location.href='http://localhost/jshelper/lessons/lessons-hub.php'">Уроки</button>
        <button class="menu-btn" onclick="location.href='http://localhost/jshelper/auth/account.php'">Аккаунт</button>
        <button class="menu-btn" onclick="location.href='http://localhost/jshelper/auth/logout.php'">Выход</button>
        <button class="menu-btn" id="up" onclick="location.href='http://localhost/jshelper'">
        <svg viewBox="0 0 16 16" width="20px" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M1 6V15H6V11C6 9.89543 6.89543 9 8 9C9.10457 9 10 9.89543 10 11V15H15V6L8 0L1 6Z" fill="#000000"></path> </g></svg>
        </button>
      </div>
</header>        
<header style="padding-left: 220px; margin-bottom: 20px;">
    <a href="http://localhost/jshelper">Главная</a> → <a href="http://localhost/jshelper/lessons/lessons-hub.php">Уроки</a> → Продвинутое введение
    </header>
    <div class="layout">        
        <div class="sidebar">
            <div class="sticky-div">
            <a class="anchor" href="#o-acnhor">Переменные и их область видимости</a><br><br>
            <a class="anchor" href="#s-acnhor">Хостинг переменных</a><br><br>
            <a class="anchor" href="#t-acnhor">Константы и неизменяемость
            </a><br><br>
            <a class="anchor" href="#f-acnhor">Итого</a><br><br>
            </div>
        </div>
        <div class="content">
    <div style="text-align: end; font-size: 85%; opacity: 0.75;">22 мая 2024</div>
    <h1>Продвинутые переменные и типы данных</h1>
    <div class="metadata">
        <div>Сложность: <span style="color: red;">Продвинуто</span></div>
        <div>Время чтения: <span style="color: #f3b937;">60 минут</span></div>
    </div>
    <h2 id="o-acnhor">Переменные и их область видимости</h2>
    <p>Переменные в JavaScript имеют различные области видимости, которые определяют, где и как они могут быть использованы. В JavaScript существует три основных типа областей видимости: глобальная, функциональная и блочная.</p>
    <pre><code>// Глобальная переменная
let globalVar = 'I am global';

function testScope() {
    // Функциональная переменная
    let localVar = 'I am local';
    console.log(localVar); // I am local
}

testScope();
console.log(globalVar); // I am global
// console.log(localVar); // Ошибка: localVar is not defined
</code></pre>
    <p>Блочная область видимости позволяет ограничить доступ к переменной в пределах блока кода, такого как условие if или цикл for.</p>
    <pre><code>if (true) {
    let blockVar = 'I am block-scoped';
    console.log(blockVar); // I am block-scoped
}
// console.log(blockVar); // Ошибка: blockVar is not defined
</code></pre>

    <h2 id="s-acnhor">Хостинг переменных</h2>
    <p>Хостинг переменных (variable hoisting) — это механизм JavaScript, при котором объявления переменных и функций перемещаются вверх своей области видимости перед выполнением кода. Это означает, что переменные могут быть использованы до их объявления.</p>
    <pre><code>console.log(hoistedVar); // undefined
var hoistedVar = 'I am hoisted';
console.log(hoistedVar); // I am hoisted
</code></pre>
    <p>Однако, переменные, объявленные с помощью let и const, не поднимаются.</p>
    <pre><code>// console.log(letVar); // Ошибка: Cannot access 'letVar' before initialization
let letVar = 'I am not hoisted';
console.log(letVar); // I am not hoisted
</code></pre>

    <h2 id="t-acnhor">Константы и неизменяемость</h2>
    <p>Константы, объявленные с помощью const, не могут быть переназначены. Однако, если константа является объектом или массивом, её содержимое может быть изменено.</p>
    <pre><code>const obj = { name: 'John' };
obj.name = 'Jane'; // Допустимо
console.log(obj.name); // Jane

// obj = {}; // Ошибка: Assignment to constant variable.
</code></pre>

    <h2 id="f-acnhor">Итого</h2>
    <p>Переменные и константы в JavaScript имеют различные области видимости и поведение. Понимание этих концепций позволяет писать более предсказуемый и безопасный код.</p>
    <p>let и const – современные способы объявления переменных и констант.</p>
    <p>var – устаревший способ объявления переменных, который поддерживает хостинг.</p>
    <p>Константы, объявленные с помощью const, не могут быть переназначены, но их содержимое может быть изменено, если они являются объектами или массивами.</p>
</div>

    </div>    
</body>
</html>
    <?php
    }
}
?>
