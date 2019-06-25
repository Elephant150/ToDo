<?php
include 'db.php';


//if (isset($_GET['list'])) {
//    $list = $_GET['list'];
//    $insert_list = $db->exec("insert into lists(list_name) values ('$list')");
//    header('Location:index.php');
//}

//if (isset($_POST['task'])) {
//    $task = $_POST['task'];
//    $id = intval($_GET['id']);
//    $insert = $db->exec("insert into tasks(list_id, task) value('$id','$task')");
//    header("Location:");
//}

//if (isset($_GET['del_task'])) {
//    $id = $_GET['del_task'];
//    $del_task = $db->query("DELETE FROM tasks WHERE id = $id");
//    header("location:");
//}