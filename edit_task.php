<?php
include 'view/header.php';
include 'db.php';
$idt = $_GET['edit_task'];
try{
    $stmt = $db->prepare("select * from tasks where id = $idt");
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
    }
}

catch (PDOException $e){
    print_r("Error - ".$e->getMessage()."<br>");
    die();
}

//function getTask($list_id)
//{
//    $sql = "SELECT task FROM tasks WHERE list_id = :list_id ORDER BY id DESC";
//    $statement = $GLOBALS['db']->prepare($sql);
//    $statement->execute([
//        'list_id' => $list_id
//    ]);
//    $list = $statement->fetchAll(PDO::FETCH_ASSOC);
//    return $list;
//}

//if (isset($_POST['task'])) {
//    $task = $_POST['task'];
//    $id = intval($_GET['id']);
//    $insert = $db->exec("insert into tasks(list_id, task) value('$id','$task')");
//    header("Location:");
//}
//
//if (isset($_GET['del_task'])) {
//    $id_task = $_GET['del_task'];
//    $delete_task = $db->query("DELETE FROM tasks WHERE id = $id_task");
//    header("location:");
//}

?>

<div class="container">

    <form action="" method="post">
        <input type="text" name="task" placeholder="Enter your task" value="" class="form-control"><br>
        <input type="submit"  value="submit" class="btn btn-dark">
    </form>

</div>
<?php include 'view/footer.php'; ?>
