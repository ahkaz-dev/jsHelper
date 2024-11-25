<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Js-helper</title>
  <link rel="stylesheet" href="static/css/index.css">
</head>
<body>
  <div class="container">
    <header class="top-bar">
      <span class="small-text">сделано с помощью php</span>
      <div class="menu">
        <button class="menu-btn">Помощь</button>
        <button class="menu-btn">Уроки</button>
        <button class="menu-btn" onclick="location.href='auth/login.php'">Войти</button>
      </div>
    </header>

    <main class="content">
      <div class="left">
        <ul class="topics">
          <li>Введение</li>
          <li>Основы JavaScript</li>
          <li>Качество кода</li>
          <li>Типы данных</li>
        </ul>
      </div>
      <div class="right">
        <span class="curly-brace">{</span>
        <h1 class="logo">Js-helper</h1>
      </div>
    </main>
  </div>
</body>
</html>
