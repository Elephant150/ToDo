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
    <title>T0D0List</title>
</head>
<body>
<form action="index.php" method="post">
    <input type="hidden" name="id" value="<?= $id; ?>">

    <?php if (isset($errors)) { ?>
        <p><?= $errors; ?></p>
    <?php } ?>

    <input type="text" name="task" class="taskInput" value="<?= $task; ?>">

    <?php if($edit_task == false): ?>
        <button type="submit" class="taskButton" name="submit">Add</button>

    <?php else: ?>
        <button type="submit" class="taskButton" name="edit">Edit</button>

    <?php endif ?>
</form>

<table class="blockItem">
    <thead>
    <tr>
        <th>№</th>
        <th>Task</th>
        <th>Delete</th>
        <th>Edit</th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1;
    while ($row = mysqli_fetch_array($todo)) { ?>
        <tr>
            <td><?= $i ?></td>
            <td class="task"><?= $row['task']; ?></td>
            <td class="delete">
                <a href="index.php?del_task=<?= $row['id']; ?>">X</a>
            </td>
            <td class="edit">
                <a href="index.php?edit_task=<?= $row['id']; ?>">E</a>
            </td>
        </tr>
        <?php $i++;
    } ?>
    </tbody>
</table>
</body>
</html>