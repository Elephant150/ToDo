<?php
include 'db/db.php';
function getTask($list_id)
{
    $sql = "SELECT task FROM tasks WHERE list_id = :list_id ORDER BY id DESC";
    $statement = $GLOBALS['db']->prepare($sql);
    $statement->execute([
        'list_id' => $list_id
    ]);
    $lists = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $lists;
}


if (!empty(getTask($_GET['id'])))
    print_r(getTask($_GET['id']));