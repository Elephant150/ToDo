<?php include 'view/header.php'; ?>
<div class="container">
    <h1><a href="index.php"><i title="Back to the lists?" class="fas fa-arrow-left arrow"></i></a>Tasks</h1>
    <form method="post">
        <div class="mb-2">

            <table class="table table-borderless">
                <tbody>
                <tr>
                    <td class="largeBox"><input type="text" name="taskName" class="form-control"
                                                placeholder="enter something"
                                                required></td>
                    <td class="smallBox">
                        <button type="submit" name="btn" class="btn btn-dark mb-2">Add task</button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </form>
    <?php include 'config/tasksConfig.php'; ?>

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col" class="largeBox">Tasks</th>
            <th scope="col" class="smallBox">Done</th>
            <th scope="col" class="smallBox">Edit</th>
            <th scope="col" class="smallBox">Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($res as $re) {
            $id = $re['id'];
            if ($id) {
                $chb = $re['chb'];
                ?>
                <tr>
                    <td class="largeBoxTask"><?= $re['task']; ?></td>
                    <td class="smallBox"><?php
                        if ($chb == 1) {
                            echo '<input type="checkbox"  name="chb" checked>';
                        } else {
                            echo '<input type="checkbox"   name="chb" >';
                        } ?></td>
                    <td class="smallBox"><?= ' <a href="edit/editTask.php?edit=' . $id . '">Edit</a>'; ?></td>
                    <td class="smallBox"><?= ' <a href="?del=' . $re['id'] . '">Delete</a>'; ?></td>
                </tr>
                <?php
            }
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>