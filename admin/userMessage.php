<style>
        table {
            width: 100%;
            border-collapse: collapse;
            padding: 50;
        }

        table tbody tr:nth-child(even){
	        background: #dbeef9;
        }   

        thead {
	        background: #d1d1d1;
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
    margin-left: 3%;
    margin-top: 1%;
}
tr {
    transition: background 0.2s;
}
table tbody tr:hover {
    background: #bdffd4;
    cursor: pointer;
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

#slideForm {
    top: 10%;
    position: relative;
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
            <title>Отзывы</title>
            <link rel="stylesheet" type="text/css" href="../static/css/account/account.css">
        </head>
<header class="top-bar">
      <span class="small-text"><a  target="_blank" href="https://www.php.net/"></a></span>
      <div class="menu">
        <button class="menu-btn" onclick="location.href='http://localhost/jshelper/admin'">Назад</button>
        <button class="menu-btn">Помощь</button>
        <button class="menu-btn" onclick="location.href='http://localhost/jshelper/auth/account.php'">Аккаунт</button>
        <button class="menu-btn" onclick="location.href='http://localhost/jshelper/auth/logout.php'">Выход</button>
        <button class="menu-btn" id="up" onclick="location.href='http://localhost/jshelper'">
        <svg viewBox="0 0 16 16" width="20px" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M1 6V15H6V11C6 9.89543 6.89543 9 8 9C9.10457 9 10 9.89543 10 11V15H15V6L8 0L1 6Z" fill="#000000"></path> </g></svg>
        </button>
      </div>
</header> 

<button class="btn" id="toggleButton">Добавить новый отзыв</button>


<div id="slideBlock" class="slide-block">
    <form id="slideForm" method="POST">
        <div style="display:ruby-text">
            <label for="userId">Вы работаете с</label>
            <input type="text" id="userId" name="userId" readonly style="width: max-content;">
        </div>

        <textarea placeholder="Отзыв" name='message' id='message' class="form-input" rows="10" cols="33" required maxlength='550'></textarea>
        
        <input type="text" placeholder="Пароль" name="whosend" id="whosend" style="margin-bottom:0px;" maxlength="25" required>
        <span style="opacity:0.75;font-size:15px">Пример: Захар</span>

        <br><br>
        <button type="submit" id="updateButton" name="updateRequest">Редактировать</button>
        <button type="submit" id="submitButton">Добавить</button>
        <button type="button" id="clearButton">Очистить</button>
    </form>
</div>  

<?php
        try {
            // Пытаемся найти данные в базе
            $stmt = $pdo->prepare("SELECT * FROM wishesbyusers ORDER BY wishesId ASC");
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
                <th>Отзыв</th>
                <th>От кого</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
        <?php
        while ($row = $stmt->fetch(PDO::FETCH_LAZY)) {
            echo '<tr class="list-items">';
            echo '<td>' . htmlspecialchars($row->WishesId) . '</td>';
            echo '<td>' . htmlspecialchars($row->Message) . '</td>';
            echo '<td>' . htmlspecialchars($row->Whosend) . '</td>';
            echo '<td>
                      <a href="?WishesId='. htmlspecialchars($row->WishesId) .'">удалить</a>
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
    $whosend = trim($_POST['whosend']);
    $message = trim($_POST['message']);
    $WishesId = trim($_POST['userId'] ?? '');

    try {
        if (!empty($WishesId)) {
            $stmt = $pdo->prepare(
                "UPDATE wishesbyusers 
                 SET Message = :Message, 
                     Whosend = :Whosend, 
                 WHERE WishesId = :WishesId"
            );
            $stmt->bindParam(':Message', $message, PDO::PARAM_STR);
            $stmt->bindParam(':Whosend', $whosend, PDO::PARAM_STR);
            $stmt->bindParam(':WishesId', $WishesId, PDO::PARAM_INT);

            if ($stmt->execute()) {
                $message = "Запись успешно обновлена.";
            } else {
                $message = "Ошибка: не удалось обновить запись.";
            }
        } else {
            $stmt = $pdo->prepare(
                "INSERT INTO wishesbyusers (Message, Whosend) 
                 VALUES (:Message, :Whosend)"
            );
            $stmt->bindParam(':Message', $message, PDO::PARAM_STR);
            $stmt->bindParam(':Whosend', $whosend, PDO::PARAM_STR);

            if ($stmt->execute()) {
                $message = "Запись успешно добавлена.";
            } else {
                $message = "Ошибка: не удалось добавить запись.";
            }
        }

        // Перенаправление после успешного выполнения
        echo '<script type="text/javascript">';
        echo 'window.location.href = "http://localhost/jshelper/admin/userMessage.php";';
        echo '</script>';
    } catch (PDOException $e) {
        $message = "Ошибка: " . $e->getMessage();
    }
}


if (isset($_GET['WishesId'])) {
    $Id = $_GET['WishesId'];

    try {
        // Подготовка запроса с использованием параметра
        $stmt = $pdo->prepare("DELETE FROM `wishesbyusers` WHERE `WishesId` = :WishesId");
        $stmt->bindParam(':WishesId', $Id, PDO::PARAM_INT); // Привязка параметра

        // Выполнение запроса
        if ($stmt->execute()) {
            echo '<script type="text/javascript">';
            echo 'window.location.href = "http://localhost/jshelper/admin/userMessage.php";';
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