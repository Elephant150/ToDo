<?php
$connect = new PDO("mysql:host = mysql.zzz.com.ua; dbname = psaradise; charset = utf8", 'psaradise', 'Psaradise1');
if (isset($_POST['text'])) {
    $text = $_POST['text'];
    $date = date('Y-m-d H:i:s');
    $query = $connect->query(/** @lang text */ "INSERT INTO psaradise.todo (text, date) VALUES ('$text', '$date')");
}
if ((!empty($_POST['text']))) {
    header('Location:http://todo-notebook.kl.com.ua/');
}
?>