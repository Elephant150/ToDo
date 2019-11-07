<?php
include "db.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
//вивід потрібних тасків
$sql = $dbh->prepare("SELECT * FROM tasks where list_id=? order by id desc");
$sql->execute(array($id));//потрібний id
$res = $sql->fetchAll();


//запис нового таска в бд
if (isset($_POST['btn'])){
    $taskName = $_POST['taskName'];
    $lid = $_GET['id'];
    $sql = $dbh->exec("insert into tasks (task, list_id) values ('$taskName', '$lid')");
    header('location: ');
}
//видалення таску
if (isset($_GET['del'])){
    $del = $_GET['del'];
    $delete = $dbh->query("delete from tasks where id=$del");
    header("location: tasks.php?id=$_COOKIE[tid]");//сторінка з id ,що лежить в кукі
}
//запис id в кукі
if (isset($_GET['id']) ){
    setcookie('tid', $_GET['id']);
}