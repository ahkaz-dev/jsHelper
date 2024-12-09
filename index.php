<?php 
session_start();
require_once './db/db.php';
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $usermessage = trim($_POST['userbest_message']);
  $username = trim($_POST['userbest_name']);

  try {
    $stmt = $pdo->prepare("INSERT INTO wishesbyusers (Message, Whosend) VALUES (:message, :whosend)");
    $stmt->bindParam(':message', $usermessage, PDO::PARAM_STR);
    $stmt->bindParam(':whosend', $username, PDO::PARAM_STR);

    if ($stmt->execute()) {
        $message = "Сообщение отправлено";
    } else {
        $message = "Ошибка отправки";
    }
  } catch (PDOException $e) {
    $message = "Ошибка: " . $e->getMessage();
  }
}
require_once './db/dublicatemessage.php';

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
<?php 
    if ($message) {
        if (str_contains($message, "отправлено")) {
            echo "<p><strong class='notifi-account-reg-apply'>$message</strong></p>";
        } else if (str_contains($message, "Ошибка")) {
            echo "<p><strong class='notifi-account-reg-undo'>$message</strong></p>";
        }
    }
?>
  <div class="container" id="up">
    <header class="top-bar">
      <span class="small-text"><a  target="_blank" href="https://www.php.net/">сделано с помощью php</a></span>
      <div class="menu">
        <button class="menu-btn">Помощь</button>
        <button class="menu-btn" onclick="location.href='lessons/lessons-hub.php'">Уроки</button>
        <?php 
        if(!isset($_SESSION["auth-header-login"])) {
          ?>
          <button class="menu-btn" onclick="location.href='auth/login.php'">Войти</button>
        <?php
        } else {
          ?>
          <button class="menu-btn" onclick="location.href='auth/account.php'">Аккаунт</button>
          <button class="menu-btn" onclick="location.href='auth/logout.php'">Выход</button>
        <?php
        }
        ?>
        <button class="menu-btn" id="up" onclick="location.href='#up'">}}}</button>
      </div>
    </header>
    <main class="content">
      <div class="left">
        <ul class="topics">
          <li>
            <?php 
            if(!isset($_SESSION["auth-header-login"])) { ?>
              <a href="lessons/noauth/vedenie.php">Введение</a>
            <?php
            } else { ?>
              <a href="lessons/authi/prod-vedenie.php">Введение+</a>
            <?php } ?>
          </li>
          <li>
            <a href="lessons/noauth/osnov-js.php">Основы JavaScript</a>
          </li>
          <li>
            <a href="/jsHelper/errors/404.php">Типы Данных</a>
          </li>
          <li>
            <a href="/jsHelper/errors/404.php">Функции</a>
          </li>
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
        <a href="lessons/lessons-hub.php">
          <li>Уроки</li>
        </a>
        <a href="#">
          <li>О нас</li>
        </a>
        <a href="auth/login.php">
          <li>Вход</li>
        </a>
        <a href="#">
          <li>Помощь</li>
        </a>
      </ul>
    </div>
    <div class="b-f-sidebar">
    <p>Заметки и любые пожелания</p>
    <div class="footer-content">
      <form method='POST'>
        <textarea placeholder="Пожелания" name='userbest_message' class="form-input" rows="10" cols="33" required maxlength='550'></textarea>
        <input type="text" placeholder="Ваш юзернейм" name='userbest_name' class="form-input" maxlength='25' required>
        <button type="submit" class="submit-button">Отправить</button>
        <br>
        <button type="reset" class="reset-button">Очистить форму</button>
      </form>
    </div>
    </div>

  </div>
  <footer class="footer-note">
    <p>open source project</p>
  </footer>
<script>
  window.onscroll = function() {scrollcheck()};

  var header = document.getElementsByClassName("top-bar");
  var notif = document.getElementsByClassName("notifi-account-reg-apply");
  var sticky = header.offsetTop;

  function scrollcheck() {
    if (window.pageYOffset > sticky) {
      header.classList.add("sticky");
      notif.classList.add("sticky");
    } else {
      header.classList.remove("sticky");
      notif.classList.remove("sticky");
    }
  }

  function showNotification() {
    var notifications = document.querySelectorAll('.notifi-account-reg-apply, .notifi-account-reg-undo');
    notifications.forEach(function(notification) {
        notification.classList.add('visible');

        setTimeout(function() {
            notification.classList.remove('visible');
        }, 8000); // 8 секунд
    });
  }

window.onload = showNotification;
</script> 
</body>
</html>
