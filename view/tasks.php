<?php
include 'header.php';

?>
<div class="container">

<form action="" method="post">
    <input type="text" name="task" placeholder="Enter your task" class="form-control"><br>
    <input type="submit" value="submit" class="btn btn-dark">
</form>
    <br>
<?php
include 'config/config_task.php';
echo "<pre>";
if (!empty(getTask($_GET['id'])))
    print_r(getTask($_GET['id']));
echo "</pre>";
?>
<!--    <table class="table">-->
<!--        <thead class="thead-dark">-->
<!--        <tr>-->
<!--            <th scope="col">№</th>-->
<!--            <th scope="col" class="table_list">List</th>-->
<!--            <th scope="col">Delete</th>-->
<!--            <th scope="col">Edit</th>-->
<!--        </tr>-->
<!--        </thead>-->
<!--        <tbody class="table_body">-->
<!--        --><?php //include 'config/config_task.php';
//        $i = 1;
//        if (!empty($sql)) {
//            foreach ($sql as $value) {
//                if ($value) { ?>
<!--                    <tr>-->
<!--                        <th scope="row">--><?//= $i; ?><!--</th>-->
<!--                        <td>-->
<!--                            <p>--><?//= getTask($_GET['id']) ?><!--"'></p>-->
<!--                        </td>-->
<!--                        <td><a href='tasks.php?del_list="--><?//= intval($value['id']) ?><!--"'><i class="fas fa-trash"></i></a></td>-->
<!--                        <td> <a href="tasks.php?edit_list=--><?//= intval($value['id']) ?><!--"><i class="fas fa-pen-alt"></i></a></td>-->
<!--                    </tr>-->
<!--                --><?php //}
//                $i++;
//
//            }
//        }
//        ?>
<!--        </tbody>-->
<!--    </table>-->

</div>
<?php include 'footer.php'; ?>
