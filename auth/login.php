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
	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
				<form>
					<label for="chk" aria-hidden="true">Создать</label>
					<input type="text" name="txt" placeholder="Логин" required="">
					<input type="email" name="email" placeholder="Email" required="">
					<input type="password" name="pswd" placeholder="Пароль" required="">
					<button>Зарегистрироваться</button>
				</form>
			</div>

			<div class="login">
				<form>
					<label for="chk" aria-hidden="true">Войти</label>
					<input type="email" name="email" placeholder="Логин" required="">
					<input type="password" name="pswd" placeholder="Пароль" required="">
					<button>Login</button>
				</form>
			</div>
	</div>
</body>
</html>