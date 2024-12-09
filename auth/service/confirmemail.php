<?php 
session_start();

$_SESSION["capchaGen"] = substr(bin2hex(random_bytes(16)), 0, 5);
require_once '/xampp/htdocs/jshelper/db/db.php';
$message = '';        

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = trim($_POST['regemail']);
    $userCaptcha = trim($_POST['regcaptcha']);
    var_dump($userCaptcha);
    var_dump($_SESSION["capchaGen"]);
    
    if ($userCaptcha === $_SESSION["capchaGen"]) {
        $to      = $email;
        $subject = 'Подтверждение почты';
        $message = 'Вы указали свою почту для подтверждения, пройдите по ссылке ниже, чтобы активировать почту на аккаунте'
                    . '';
        $headers = 'From: jshelperContact@helper.com'       . "\r\n" .
                     'Reply-To: {webmaster@helper.com}' . "\r\n" .
                     'X-Mailer: PHP/' . phpversion();
    
        mail($to, $subject, $message, $headers);
        $message = "Проверьте вашу почту на наличие сообщения";
    } else {
        $message = "Ошибка: неправильно введена капча";
    }    
    
} else {
    $message = "Ошибка сервера";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Подтвердить почту</title>
    <link rel="stylesheet" type="text/css" href="/jshelper/static/css/auth/login.css">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
    <style>
        label {
            transition: none;
        }
        .main-label {
            color: #fff;
            font-size: 2.3em;
            justify-content: center;
            display: flex;
            margin: 50px;
            margin-bottom: 20px;
            font-weight: bold;
            cursor: default;
        }
        input:checked {
            border: none;
            outline: 2px solid deeppink;
        }
        .preview {
            width: 60%;
            background: #e0dede;
            justify-content: center;
            margin: 20px auto 0px auto;
            padding: 12px;
            border: none;
            outline: none;
            border-radius: 5px;
            justify-content: center;
            display: flex;
        }
        .preview p {
            display: contents;
            font-size: 35px;
        }
        .notifi-account-reg-undo {
            top: 30px;
            left: 30px;
        }
    </style>
</head>
<body>
<?php 
    if ($message) {
        if (str_contains($message, "Проверьте")) {
            echo "<p><strong class='notifi-account-reg-apply'>$message</strong></p>";
        } else if (str_contains($message, "Ошибка")) {
            echo "<p><strong class='notifi-account-reg-undo'>$message</strong></p>";
        }
    }
?>    
<div class="button-back">
			<a href="/jshelper/auth/account.php" class="back-button">&larrhk;</a>
</div>
	<div class="main" style='width: auto;'>
		<input type="checkbox" id="chk" aria-hidden="true">
			<div class="signup">
				<form method='post'>
					<label for="chk" aria-hidden="true" class='main-label'>Подтвердите почту</label>
                    <span class="form_span_help" >
							Введите вашу почту
                    </span>                    
					<input type="email" name="regemail" placeholder="Email" style='margin-top:5px;' required>

                    <br>
                    <div class="preview"><p><?= $_SESSION["capchaGen"]; ?></p></div>
                    <br>
                    <span class="form_span_help" >
							Введите капчу
                    </span>                    
					<input type="text" name="regcaptcha" placeholder="Капча" maxlength='5' style='margin-top:5px;' required>
                    <button type=submit>Подтвердить</button>
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