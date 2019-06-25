<?php
include 'db/db.php';
function getTask($list_id)
{
    $sql = "SELECT tasks FROM task WHERE list_id = :list_id ORDER BY id DESC";
    $statement = $GLOBALS['db']->prepare($sql);
    $statement->execute([
        'list_id' => $list_id
    ]);
    $list = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $list;
}

if (isset($_POST['task'])) {
    $task = $_POST['task'];
    $id = intval($_GET['id']);
    $insert = $db->exec("insert into task(list_id, task) value('$id','$task')");
    header("Location:");
}