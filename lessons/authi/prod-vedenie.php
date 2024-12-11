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
            <a class="anchor" href="#o-acnhor">Что такое JavaScript?</a><br><br>
            <a class="anchor" href="#s-acnhor">Функции высшего порядка</a><br><br>
            <a class="anchor" href="#t-acnhor">Модули</a><br><br>
            <a class="anchor" href="#f-acnhor">Заключение</a><br><br>
            </div>
        </div>
        <div class="content">
            <div style="text-align: end; font-size: 85%; opacity: 0.75;">14 мая 2024</div>
            <h1>Продвинутое введение в JavaScript</h1>
            <div class="metadata">
                <div>Сложность: <span style="color: rebeccapurple;">Трудно</span></div>
                <div>Время чтения: <span style="color: #f3b937;">15 минут</span></div>
            </div>        
    <h2 id="o-acnhor">Что такое JavaScript?</h2>
    <p>JavaScript — это высокоуровневый, интерпретируемый язык программирования, который используется для создания интерактивных и динамических веб-приложений. Он является ключевым компонентом в стеке веб-разработки, наряду с HTML и CSS. JavaScript поддерживает множество парадигм программирования, включая объектно-ориентированное, функциональное и императивное программирование.</p>

    <h2>Почему JavaScript так важен?</h2>
    <p>JavaScript изначально был создан для добавления интерактивности на веб-страницы, но с тех пор его возможности значительно расширились. Сегодня JavaScript используется не только для фронтенд-разработки, но и для серверной части (благодаря Node.js), мобильных приложений (React Native), десктопных приложений (Electron) и даже для разработки игр.</p>

    <h2>Основные концепции JavaScript</h2>
    <ol style="list-style-type: disc;" class="end-li">
        <li>Асинхронность и события</li>
        <li>Функции высшего порядка</li>
        <li>Замыкания</li>
        <li>Модули</li>
    </ol>

    <h3>Асинхронность и события</h3>
    <p>JavaScript поддерживает асинхронное программирование через промисы, async/await и события. Это позволяет создавать отзывчивые и эффективные приложения.</p>
    <pre><code>async function fetchData() {
    try {
        let response = await fetch('https://api.example.com/data');
        let data = await response.json();
        console.log(data);
    } catch (error) {
        console.error('Ошибка:', error);
    }
}

fetchData();</code></pre>

    <h3 id="s-acnhor">Функции высшего порядка</h3>
    <p>Функции в JavaScript являются объектами первого класса, что позволяет передавать их как аргументы, возвращать из других функций и использовать в качестве обработчиков событий.</p>
    <pre><code>function higherOrderFunction(callback) {
    callback();
}

higherOrderFunction(() => {
    console.log('Это функция высшего порядка');
});</code></pre>

    <h3>Замыкания</h3>
    <p>Замыкания позволяют функциям запоминать и использовать переменные из их лексического окружения, даже после того, как это окружение завершило выполнение.</p>
    <pre><code>function createCounter() {
    let count = 0;
    return function() {
        count++;
        return count;
    };
}

const counter = createCounter();
console.log(counter()); // 1
console.log(counter()); // 2</code></pre>

    <h3 id="t-acnhor">Модули</h3>
    <p>JavaScript поддерживает модули через синтаксис ES6, что позволяет организовывать код в отдельные файлы и импортировать/экспортировать функции, объекты и классы.</p>
    <pre><code>// module.js
export function greet(name) {
    console.log(`Привет, ${name}!`);
}

// main.js
import { greet } from './module.js';
greet('Мир');</code></pre>

    <h2>Современные инструменты и библиотеки</h2>
    <ol style="list-style-type: disc;" class="end-li">
        <li>Node.js</li>
        <li>React</li>
    </ol>

    <h3>Node.js</h3>
    <p>Node.js позволяет выполнять JavaScript на сервере, что открывает возможности для создания полноценных серверных приложений.</p>
    <pre><code>const http = require('http');

const server = http.createServer((req, res) => {
    res.statusCode = 200;
    res.setHeader('Content-Type', 'text/plain');
    res.end('Привет, мир!\n');
});

server.listen(3000, '127.0.0.1', () => {
    console.log('Сервер запущен на http://127.0.0.1:3000/');
});</code></pre>

    <h3>React</h3>
    <p>React — это библиотека для создания пользовательских интерфейсов, которая использует компонентный подход и виртуальный DOM для повышения производительности.</p>
    <pre><code>import React from 'react';
import ReactDOM from 'react-dom';

function App() {
    return '&lt;h1&gt;Привет, мир!</h1>';
}

ReactDOM.render(<App />, document.getElementById('root'));</code></pre>

    <h2 id="f-acnhor">Заключение</h2>
    <p>JavaScript — это мощный и гибкий язык программирования, который продолжает развиваться и адаптироваться к новым требованиям веб-разработки. Понимание его основных концепций и современных инструментов позволяет создавать сложные и масштабируемые приложения, которые удовлетворяют потребности современных пользователей.</p>
    </div> 
    </div>    
</body>
</html>
    <?php
    }
}
?>
