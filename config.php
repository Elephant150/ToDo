<?php

$task = "";
$list = "";
$id = 0;
$list_id = 0;
$edit_task = false;
$edit_list = false;

$errors = "";

$db = mysqli_connect('psaradise', 'root', '', 'psaradise');
$db_group = mysqli_connect('psaradise', 'root', '', 'psaradise');

//item
if (isset($_POST['submit'])) {
    $task = $_POST['task'];

    if (empty($task)) {
        echo "";
    } else {
        mysqli_query($db, "INSERT INTO todo (task) VALUES ('$task')");
        header('location: item.php');
    }

}
//-------------------------
//list
if (isset($_POST['submit'])) {
    $list = $_POST['list'];

    if (empty($list)) {
        echo "";
    } else {
        mysqli_query($db_group, "INSERT INTO db_list (list) VALUES ('$list')");
        header('location: index.php');
    }

}
//-------------------------
//item
if (isset($_GET['del_task'])) {
    $id = $_GET['del_task'];

    mysqli_query($db, "DELETE FROM todo WHERE id = $id");
    header("location: item.php");
}

//list
//---------------------
if (isset($_GET['del_list'])) {
    $list_id = $_GET['del_list'];

    mysqli_query($db_group, "DELETE FROM db_list WHERE list_id = $list_id");
    header("location: index.php");
}
//---------------------

//item
if (isset($_POST['edit'])) {
    $task = $_POST['task'];
    $id = $_POST['id'];

    mysqli_query($db, "UPDATE todo SET task = '$task' WHERE id = $id");
    header("location:item.php");
}

//list
//-----------------
if (isset($_POST['edit_btn_list'])) {
    $list = $_POST['list'];
    $list_id = $_POST['list_id'];

    mysqli_query($db_group, "UPDATE db_list SET list = '$list' WHERE list_id = $list_id");
    header("location:index.php");
}
//-----------------

//item edit
if (isset($_GET['edit_task'])) {
    $id = $_GET['edit_task'];

    $edit_task = true;

    $edit = mysqli_query($db, "SELECT * FROM todo WHERE id=$id");
    $record = mysqli_fetch_array($edit);
    $task = $record['task'];
    $id = $record['id'];
}

//list edit
//-----------------
if (isset($_GET['edit_list'])) {
    $list_id = $_GET['edit_list'];

    $edit_list = true;

    $edit_btn_list = mysqli_query($db_group, "SELECT * FROM db_list WHERE list_id=$list_id");
    $record_list = mysqli_fetch_array($edit_btn_list);
    $list = $record_list['list'];
    $list_id = $record_list['list_id'];
}
//-----------------

//echo $_GET['cb'];
//
//$cb = (!empty($_GET['cb'])) ? (int) $_GET['cb'] : 0;
//
//mysqli_query("UPDATE `todo` SET `value` = $cb WHERE `option` = 'cb' ");

$todo = mysqli_query($db, "SELECT * FROM todo ORDER BY id DESC ");
$db_list = mysqli_query($db_group, "SELECT * FROM db_list ORDER BY list_id DESC ");

