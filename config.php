<?php

$task = "";
$id = 0;
$edit_task = false;

$errors = "";

$db = mysqli_connect('', '', '', '');
//server
if (isset($_POST['submit'])) {
    $task = $_POST['task'];

    if (empty($task)) {
        echo '<script>alert("Error!!! Empty task")</script>';
    } else {
        mysqli_query($db, "INSERT INTO todo (task) VALUES ('$task')");
        header('location: index.php');
    }

}
//index
if (isset($_GET['del_task'])) {
    $id = $_GET['del_task'];

    mysqli_query($db, "DELETE FROM todo WHERE id = $id");
    header("location: index.php");
}

//server
if (isset($_POST['edit'])) {
    $task = $_POST['task'];
    $id = $_POST['id'];

    mysqli_query($db, "UPDATE todo SET task = '$task' WHERE id = $id");
    header("location:index.php");
}

//------index-------------*************************
if (isset($_GET['edit_task'])) {
    $id = $_GET['edit_task'];

    $edit_task = true;

    $edit = mysqli_query($db, "SELECT * FROM todo WHERE id=$id");
    $record = mysqli_fetch_array($edit);
    $task = $record['task'];
    $id = $record['id'];
}
//-------------------*************************

echo $_GET['cb'];

$cb = (!empty($_GET['cb'])) ? (int) $_GET['cb'] : 0;

mysqli_query("UPDATE `todo` SET `value` = $cb WHERE `option` = 'cb' ");

$todo = mysqli_query($db, "SELECT * FROM todo ORDER BY id DESC ");
