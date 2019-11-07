<?php
include 'db.php';
//id ліста
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
//номер сторінки
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$notesOnPage = 6; //кількість відображуваних лістів
$from = ($page - 1) * $notesOnPage; //початок відображення (0)

$sql = $dbh->prepare("SELECT COUNT(*) FROM lists order by id desc "); //підрахунок елементів таблиці
$sql->execute();
$res = $sql->fetchAll();
// розподіл елементів по сторінках
foreach ($res as $elem){
    foreach ($elem as $num){
        $pageCount = ceil($num / $notesOnPage);
    }
}

$sth = $dbh->prepare("SELECT * FROM lists  order by id desc LIMIT $from,$notesOnPage"); //відображення елементів певної сторінки
$sth->execute();
$res = $sth->fetchAll();
//запис нового ліста в бд
if (!empty($_POST['listName'])){
    $listName = $_POST['listName'];
    $sql = $dbh->exec("insert into lists (list_name) value ('$listName')");
    header('location: index.php');
}
//видалення ліста
if (isset($_GET['del'])){
    $del = $_GET['del'];
    $delete = $dbh->query("delete from lists where id=$del");
    header('location: index.php');
}

