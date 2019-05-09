<?php
$connect = new PDO("mysql:host = ; dbname = ; charset = utf8", '', '');
if (isset($_POST['text'])) {
    $text = $_POST['text'];
    $date = date('Y-m-d H:i:s');
    $query = $connect->query(/** @lang text */ "INSERT INTO psaradise.todo (text, date) VALUES ('$text', '$date')");
}
if ((!empty($_POST['text']))) {
    header('Location:http://todo-notebook.kl.com.ua/');
}
?>