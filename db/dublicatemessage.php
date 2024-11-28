<?php
$dbname = 'jshelper';
$username = 'rootjs';
$password = ']9gY/_MsYKexSbYW';
$conn = mysqli_connect("localhost", $username, $password, $dbname);

$sql = "
DELETE c1 FROM wishesbyusers c1
JOIN wishesbyusers c2 
ON c1.Message = c2.Message AND c1.Whosend = c2.Whosend
WHERE c1.WishesId > c2.WishesId;
";
if (mysqli_query($conn, $sql)) {
    echo "<script>console.log('Дубликаты удалены');". "</script>";

} else {
    echo "<script>console.log(". mysqli_error($conn) . ");". "</script>";
}