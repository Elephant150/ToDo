<?php
include 'view/header.php';
?>
<div class="container">

    <h1>To Do List</h1>

    <!--form of adding a list-->
    <form action="" method="get">
        <input type="text" name="list" class="form-control" value="" required><br>
        <input type="submit" name="submit" value="submit" class="btn btn-dark">
    </form>
    <br>

    <!--table of list output-->
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
        <?php include 'config/config_list.php';
        $i = 1;
        if (!empty($query)) {
            foreach ($query as $value) {
                if ($value) { ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td>
                            <a href='tasks.php?id=<?= intval($value['id'])?>'>
                                <?= $value['list_name'] ?>
                            </a>
                        </td>
                        <td><a href='index.php?del_list="<?= intval($value['id']) ?>"'><i class="fas fa-trash"></i></a></td>
                        <td> <a href="index.php?edit_list=<?= intval($value['id']) ?>"><i class="fas fa-pen-alt"></i></a></td>
                    </tr>
                <?php }
                $i++;

            }
        }
        ?>
        </tbody>
    </table>

</div>


<?php include 'view/footer.php'; ?>
