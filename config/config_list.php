<?php
include 'db.php';

//output data
$query = $db->query("select * from lists order by id desc ")->fetchAll();
// insert new list
if (isset($_GET['list'])) {
    $list = $_GET['list'];
    $insert_list = $db->exec("insert into lists(list_name) values ('$list')");
    header('Location:index.php');
}
//delete list
if (isset($_GET['del_list'])) {
    $id = $_GET['del_list'];
    $del_list = $db->query("DELETE FROM lists WHERE id = $id");
    $del_list = $db->query("DELETE FROM tasks WHERE list_id = $id");
    header("location: index.php");
}

