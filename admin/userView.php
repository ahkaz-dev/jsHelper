<style>
            table {
            width: 100%;
            border-collapse: collapse;
            padding: 50;
        }

        .table-container {
            padding: 50;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 20px;
            text-align: center;
            vertical-align: top;
        }
        .cell h2 {
            margin-top: 0;
        }
        .cell p {
            margin: 10px 0;
        }
        .cell a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .cell a:hover {
            background-color: #0056b3;
        }

        .btn {
            background: #fff;
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 8px 15px;
            font-size: 14px;
            cursor: pointer;
            transition: background 0.2s;
            border-color: #9B98B7;
            border-radius: 21px;
            font-size: 20px;
            border-width: 2px;
        }
  
  .btn:hover {
    background: #f0f0f0;
  }
  #toggleButton {
    margin-left: 1%;
}

.slide-block {
    position: fixed;
    top: 0;
    right: -50%; /* Initial position off-screen */
    width: 300px;
    height: 100%;
    background-color: #f0f0f0;
    padding: 20px;
    box-shadow: 2px 0 5px rgba(0, 0, 0, 0.3);
    transition: all 0.5s ease;
}

.slide-block.active {
    right: 0; /* Slide in position */
}

#updateButton {
    display: none;
}
#updateButton.active {
    display: inline-block
}
#submitButton {
    display: none;
}
#submitButton.active {
    display: inline-block
}
    

#slideForm input {
    display: block;
    margin-bottom: 10px;
    margin-top: 10px;
    padding: 10px;
    width: 100%;
    box-sizing: border-box;
}

#slideForm button {
    padding: 10px 20px;
    margin-right: 10px;
}
</style>
<?php 
session_start();
require_once('/xampp/htdocs/jshelper/db/db.php');

if (!isset($_SESSION["auth-header"])) {
    require_once('\xampp\htdocs\jsHelper\errors\403.php');
} else if (isset($_SESSION["auth-header"])) {
    if ($_SESSION["auth-header"] == "Пользователь") {
        require_once('\xampp\htdocs\jsHelper\errors\403.php');
    } else if ($_SESSION["auth-header"] == "Админ") {?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Пользователи</title>
            <link rel="stylesheet" type="text/css" href="../static/css/acemail/acemail.css">
        </head>
<header class="top-bar">
      <span class="small-text"><a  target="_blank" href="https://www.php.net/"></a></span>
      <div class="menu">
        <button class="menu-btn" onclick="location.href='http://localhost/jshelper/admin'">Назад</button>
        <button class="menu-btn">Помощь</button>
        <button class="menu-btn" onclick="location.href='http://localhost/jshelper/auth/acemail.php'">Аккаунт</button>
        <button class="menu-btn" onclick="location.href='http://localhost/jshelper/auth/logout.php'">Выход</button>
        <button class="menu-btn" id="up" onclick="location.href='http://localhost/jshelper'">
        <svg viewBox="0 0 16 16" width="20px" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M1 6V15H6V11C6 9.89543 6.89543 9 8 9C9.10457 9 10 9.89543 10 11V15H15V6L8 0L1 6Z" fill="#000000"></path> </g></svg>
        </button>
      </div>
</header> 

<button class="btn" style="margin-bottom:5" id="toggleButton">Добавить</button>


<div id="slideBlock" class="slide-block">
    <form id="slideForm" method="POST">
        <div style="display:ruby-text">
            <label for="userId">Вы работаете с</label>
            <input type="text" id="userId" name="userId" readonly style="width: max-content;">
        </div>

        <input type="text" placeholder="Логин" name="loginUser" id="loginUser" style="margin-bottom:0px;" maxlength="15" required>
        <span style="opacity:0.75;font-size:15px">Пример: Login</span>
        
        <input type="text" placeholder="Пароль" name="password" id="password" style="margin-bottom:0px;" maxlength="25" required>
        <span style="opacity:0.75;font-size:15px">Пример: qwerty123</span>

        <input type="email" placeholder="Почта" name="email" id="email" style="margin-bottom:0px;" maxlength="25" required>
        <span style="opacity:0.75;font-size:15px">Пример: mygmail@gmail.com</span>

        <input type="text" placeholder="Роль доступа" name="access" id="access" pattern="^(Пользователь|Модератор|Админ)$" style="margin-bottom:0px;" maxlength="25" required>
        <span style="opacity:0.75;font-size:15px">Пример: Пользователь, Модератор, Админ</span>


        <br><br>
        <button type="submit" id="updateButton" name="updateRequest">Редактировать</button>
        <button type="submit" id="submitButton">Добавить</button>
        <button type="button" id="clearButton">Очистить</button>
    </form>
</div>  

<?php
        try {
            // Пытаемся найти данные в базе
            $stmt = $pdo->prepare("SELECT * FROM users ORDER BY userId ASC");
            $stmt->execute();

        } catch (PDOException $e) {
            $message = "Ошибка: " . $e->getMessage();
        }
    ?>
<div class="table-container">

    <table class="data-table">
        <thead>
            <tr>
                <th>Идентификатор</th>
                <th>Логин</th>
                <th>Пароль</th>
                <th>Почта</th>
                <th>Роль доступа</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
        <?php
        while ($row = $stmt->fetch(PDO::FETCH_LAZY)) {
            echo '<tr class="list-items">';
            echo '<td>' . htmlspecialchars($row->UserId) . '</td>';
            echo '<td>' . htmlspecialchars($row->Login) . '</td>';
            echo '<td>' . htmlspecialchars($row->Password) . '</td>';
            echo '<td>' . htmlspecialchars($row->Email) . '</td>';
            echo '<td>' . htmlspecialchars($row->UserRole) . '</td>';
            echo '<td>
                      <a href="?userId='. htmlspecialchars($row->UserId) .'">удалить</a>
                  </td>';
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>
</div>      
</body>
</html>
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $access = trim($_POST['access']);
    $password = trim($_POST['password']);
    $email = trim($_POST['email']);
    $loginUser = trim($_POST['loginUser']);
    $userId = trim($_POST['userId'] ?? '');

    try {
        if (!empty($userId)) {
            $stmt = $pdo->prepare(
                "UPDATE users 
                 SET Login = :loginUser, 
                     UserRole = :access, 
                     Email = :Stockemail, 
                     Password = :password 
                 WHERE userId = :userId"
            );
            $stmt->bindParam(':loginUser', $loginUser, PDO::PARAM_STR);
            $stmt->bindParam(':access', $access, PDO::PARAM_STR);
            $stmt->bindParam(':Stockemail', $email, PDO::PARAM_STR);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR);
            $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);

            if ($stmt->execute()) {
                $message = "Запись успешно обновлена.";
            } else {
                $message = "Ошибка: не удалось обновить запись.";
            }
        } else {
            $stmt = $pdo->prepare(
                "INSERT INTO users (Login, UserRole, Password, Email) 
                 VALUES (:loginUser, :access, :password, :Email)"
            );
            $stmt->bindParam(':loginUser', $loginUser, PDO::PARAM_STR);
            $stmt->bindParam(':access', $access, PDO::PARAM_STR);
            $stmt->bindParam(':Email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR);

            if ($stmt->execute()) {
                $message = "Запись успешно добавлена.";
            } else {
                $message = "Ошибка: не удалось добавить запись.";
            }
        }

        // Перенаправление после успешного выполнения
        echo '<script type="text/javascript">';
        echo 'window.location.href = "http://localhost/jshelper/admin/userView.php";';
        echo '</script>';
    } catch (PDOException $e) {
        $message = "Ошибка: " . $e->getMessage();
    }
}


if (isset($_GET['userId'])) {
    $Id = $_GET['userId'];

    try {
        // Подготовка запроса с использованием параметра
        $stmt = $pdo->prepare("DELETE FROM `users` WHERE `userId` = :userId");
        $stmt->bindParam(':userId', $Id, PDO::PARAM_INT); // Привязка параметра

        // Выполнение запроса
        if ($stmt->execute()) {
            echo '<script type="text/javascript">';
            echo 'window.location.href = "http://localhost/jshelper/admin/userView.php";';
            echo '</script>';
        } else {
            echo "Ошибка при удалении записи.";
        }
    } catch (PDOException $e) {
        echo "Ошибка: " . $e->getMessage();
    }
}

require_once '/xampp/htdocs/jshelper/db/dublicate.php'; 

}
}
?>
<script src="/jshelper/static/js/add.js"></script>