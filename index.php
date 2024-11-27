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
  <div class="container" id="up">
    <header class="top-bar">
      <span class="small-text"><a  target="_blank" href="https://www.php.net/">сделано с помощью php</a></span>
      <div class="menu">
        <button class="menu-btn">Помощь</button>
        <button class="menu-btn">Уроки</button>
        <button class="menu-btn" onclick="location.href='auth/login.php'">Войти</button>
        <button class="menu-btn" id="up" onclick="location.href='#up'">}}}</button>
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
        <span class="curly-brace">}</span>
        <p class="logo">Js-<br>helper</p>
      </div>
    </main>
  </div>
  <div class="cont-se-b">
    <div class="container-second">
      <div class="top-section">
        <div class="card-one">
          <h2>jsHelper</h2>
          <p>Мы ищем талантливых и мотивированных разработчиков. Если вы страстно увлечены программированием и хотите делиться своими знаниями с миром.</p>
        </div>
        <div class="card-two">
          <h2>Новинки</h2>
          <p>Мы регулярно добавляем новые уроки, улучшаем существующие материалы. Следите за нашими новостями, чтобы всегда быть в курсе самых свежих тенденций!</p>
        </div>
      </div>
      <div class="bottom-section">
        <h2>Мы</h2>
        <p>
          JsHelper — ваш надежный гид в мире JavaScript! Этот веб-учебник предлагает структурированные и доступные материалы для изучения языка программирования, который лежит в основе современной веб-разработки. От базовых концепций до продвинутых техник, JsHelper поможет вам шаг за шагом освоить JavaScript, независимо от ваших навыков
        </p>
      </div>
    </div>  
  </div>
  <div class="footer-container">
    <div class="footer-sidebar">
      <ul>
        <li>Помощь</li>
        <li>О нас</li>
        <li>Вход</li>
        <li>Помощь</li>
      </ul>
    </div>
    <div class="footer-content">
      <h3>Заметки и любые пожелания</h3>
      <form>
        <input type="text" placeholder="Пожелания" class="form-input">
        <input type="text" placeholder="Ваш юзернейм" class="form-input">
        <button type="submit" class="submit-button">Отправить</button>
        <button type="reset" class="reset-button">Очистить форму</button>
      </form>
    </div>
  </div>
  <footer class="footer-note">
    <p>open source project</p>
  </footer>
  <script>
  window.onscroll = function() {myFunction()};

  var header = document.getElementsByClassName("top-bar");
  var sticky = header.offsetTop;

  function myFunction() {
    if (window.pageYOffset > sticky) {
      header.classList.add("sticky");
    } else {
      header.classList.remove("sticky");
    }
  }
</script> 
</body>
</html>
