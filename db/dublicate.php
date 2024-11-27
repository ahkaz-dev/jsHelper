<?php
$dbname = 'jshelper';
$username = 'rootjs';
$password = ']9gY/_MsYKexSbYW';
$conn = mysqli_connect("localhost", $username, $password, $dbname);

$sql = "
DELETE c1 FROM users c1
JOIN users c2 
ON c1.Login = c2.Login AND c1.Password = c2.Password
WHERE c1.UserId > c2.UserId;
";
if (mysqli_query($conn, $sql)) {
    echo "<script>console.log('Дубликаты удалены');". "</script>";

} else {
    echo "<script>console.log(". mysqli_error($conn) . ");". "</script>";
}