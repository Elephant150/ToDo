<?php
include 'view/header.php';
include 'db.php';
$id = $db->query("select * from tasks ");
function getTask($list_id)
{
    $sql = "SELECT task FROM tasks WHERE list_id = :list_id ORDER BY id DESC";
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
    $insert = $db->exec("insert into tasks(list_id, task) value('$id','$task')");
    header("Location:");
}

if (isset($_GET['del_task'])) {
    $id_task = $_GET['del_task'];
    $delete_task = $db->query("DELETE FROM tasks WHERE id = $id_task");
    header("location:");
}

?>

<div class="container">

<form action="" method="post">
    <input type="text" name="task" placeholder="Enter your task" class="form-control"><br>
    <input type="submit"  value="submit" class="btn btn-dark">
</form>
    <br>
<?php
//
//echo "<pre>";
//$id = $_GET['id'];
//if (!empty(getTask($id))) {
//    print_r(getTask($id));
//}
//echo "</pre>";
?>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">№</th>
            <th scope="col" class="table_list">List</th>
            <th scope="col">Delete</th>
            <th scope="col">Edit</th>
        </tr>
        </thead>
        <tbody class="table_body">
        <?php include 'config/config_task.php';
        $i = 1;
        $getFunc = getTask($_GET['id']);
        if (!empty($getFunc)) {
            foreach ($getFunc as $val) {
                if ($val) {
//                    ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td>
                            <pre>
                            <?php
//                            print_r(getTask($val['task']));
                            echo implode('', $val);
//                            $value;
                            ?>
                            </pre>
                        </td>
                        <td><a href='tasks.php?del_task=<?= intval($delete_task[$i]) ?>'><i class="fas fa-trash"></i></a></td>
                        <td><a href="edit_task.php?edit_list=<?= intval($id)?>"><i class="fas fa-pen-alt"></i></a></td>
                    </tr>
                    <?php
                }
                $i++;
//
            }
        }
        ?>
        </tbody>
    </table>

</div>
<?php include 'view/footer.php'; ?>
