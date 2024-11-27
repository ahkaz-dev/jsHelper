<?php
session_start();
require_once '../db/db.php';
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $login = trim($_POST['reglogin']);
    $password = trim($_POST['regpassword']);
    $email = trim($_POST['regemail']);

    try {
        $stmt = $pdo->prepare("INSERT INTO users (Login, Password, Email, UserRole) VALUES (:login, :password, :email, 'Пользователь')");
        $stmt->bindParam(':login', $login, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);

        if ($stmt->execute()) {
            $message = "Вы создали аккаут";
        } else {
            $message = "Ошибка регистрации";
        }
    } catch (PDOException $e) {
        $message = "Ошибка: " . $e->getMessage();
    }
} else if (isset($_GET['checkLogin'])) {
    $login = trim($_GET['loginInput']);
    $password = trim($_GET['passInput']);
    try {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE Login=:login AND Password=:password");
        $stmt->bindParam(':login', $login, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);

        $stmt = $pdo->prepare("SELECT * FROM users WHERE Login=:login AND Password=:password");
        $stmt->execute(['login' => $login, 'password' => $password]);
        $user = $stmt->fetch();

        if (!empty($user)) {
            echo '<script type="text/javascript">';
            echo 'window.location.href = "http://localhost/jshelper";';
            echo '</script>';
        } else {
            $message = "Ошибка: Не удалось найти пользователя";
        }
    } catch (PDOException $e) {
        $message = "Ошибка: " . $e->getMessage();
    }
}
require_once '../db/dublicate.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../static/css/auth/login.css">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
	<title>Авторизация</title>
</head>
<body>
<?php 
    if ($message) {
        if (str_contains($message, "Вы")) {
            echo "<p><strong class='notifi-account-reg-apply'>$message</strong></p>";
        } else if (str_contains($message, "Ошибка")) {
            echo "<p><strong class='notifi-account-reg-undo'>$message</strong></p>";
        }
    }
?>
<div class="button-back">
			<a href="../index.php" class="back-button">&larrhk;</a>
</div>
	<div class="main">
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
				<form method='post'>
					<label for="chk" aria-hidden="true">Создать</label>
					<input type="text" name="reglogin" placeholder="Логин" required="">
						<span class="form_span_help">
							(англ. буквы, цифры и знак подчеркивания)
						</span>
					<input type="email" name="regemail" placeholder="Email" required="">
					<input type="password" name="regpassword" placeholder="Пароль" required="">
						<span class="form_span_help">
							(минимум 8 символов)
						</span>
					<button type=submit>Зарегистрироваться</button>
				</form>
			</div>

			<div class="login">
				<form>
					<label for="chk" aria-hidden="true">Войти</label>
					<input type="text" name="loginInput" placeholder="Логин" required="">
					<input type="password" name="passInput" placeholder="Пароль" required="">
					<input type="submit" name='checkLogin' value='Войти'>
				</form>
			</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('.message a').click(function(){
        $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
    });
</script>	
</body>
</html>