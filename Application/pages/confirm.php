<?php
 use Application\Models\DataBase;

mysqli::class;

if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $about = $_POST['about'];

    $sql = "INSERT INTO myNews (name, about) VALUES('". $name ."', '". $about ."')";

    $conn->query($sql);

    $conn->close();
}
header("Location: http://localhost/List");
exit();

?>


