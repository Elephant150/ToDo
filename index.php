<?php
include 'config.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
          integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <title>T0D0List</title>
</head>
<body>
<div class="container">
    <h1>To-Do List</h1>
    <form action="index.php" method="post">
        <input type="hidden" name="id" value="<?= $id; ?>">

        <?php if (isset($errors)) { ?>
            <p><?= $errors; ?></p>
        <?php } ?>

        <input type="text" name="task" class="input form-control" value="<?= $task; ?>">

        <?php if ($edit_task == false): ?>
            <button type="submit" class="button btn btn-dark" name="submit">Add</button>

        <?php else: ?>
            <button type="submit" class="button btn btn-dark" name="edit">Edit</button>

        <?php endif ?>
    </form>


    <table class="table">
        <thead>
        <tr class="head">
            <th scope="col">№</th>
            <th scope="col">Task</th>
            <th scope="col">Done</th>
            <th scope="col">Delete</th>
            <th scope="col">Edit</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 1;
        while ($row = mysqli_fetch_array($todo)) { ?>
            <tr>
                <th scope="row"><?= $i ?></th>
                <!--                <td>--><? //= $i ?><!--</td>-->
                <td class="task"><?= $row['task']; ?></td>
                <td class="checkbox">
                    <label class="checkContainer">
                        <input type="checkbox" name="cb" value="1">
                        <span class="checkmark"></span>
                    </label>
                </td>
                <td class="delete">
                    <a href="index.php?del_task=<?= $row['id']; ?>"><i class="fas fa-trash"></i></a>
                </td>
                <td class="edit">
                    <a href="index.php?edit_task=<?= $row['id']; ?>"><i class="fas fa-pen-alt"></i></a>
                </td>
            </tr>
            <?php $i++;
        } ?>
        </tbody>
    </table>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>