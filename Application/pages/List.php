<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>News</title>
</head>
<body>
<H1 style="font-size:60px; text-align: center"> Список новостей </H1>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, name , about, photo FROM MyNews";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "№ " . $row["id"]. "  Название: " . $row["name"]. "<br>" . $row["about"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>

<br>
<a href="../create">Создать Новость</a>



</body>
</html>