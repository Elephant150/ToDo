<?php
include '../db.php';
?>
<?php
$edit = $_GET['edit'];
$sth = $dbh->prepare("SELECT * FROM lists where id=$edit");
$sth->execute();
$res = $sth->fetchAll();

foreach ($res as $re) {
    $id = $re['id'];
    $name = $re['list_name'];
}
// редагування ліста
if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $name = $_POST['listName'];

    $stmt = $dbh->prepare("UPDATE `lists` SET  `list_name` = '$name' WHERE `lists`.`id` = $id");
    $stmt->execute();
    header('Location: ../index.php');
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <title>ToDo</title>
</head>
<body>
<div class="container">
    <h1><a href="../index.php"><i title="Back to the lists?" class="fas fa-arrow-left arrow"></i></a>Edit list</h1>
    <form method="post">
        <div class="mb-2">

            <table class="table table-borderless">
                <tbody>
                <tr>
                    <td><input type="hidden" name="id" value="<?= $id; ?>"><br></td>
                    <td class="largeBox"><input type="text" name="listName" class="form-control"
                                                placeholder="enter a mame for the list"
                                                value="<?= $name; ?>" required></td>
                    <td class="smallBox">
                        <button type="submit" name="edit" class="btn btn-dark mb-2">Edit list</button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </form>
<!--    <form action="" method="post">-->
<!--        <input type="hidden" name="id" value="--><?//= $id; ?><!--"><br>-->
<!--        <input type='text' name="listName" value="--><?//= $name; ?><!--" required><br>-->
<!--        <input type="submit" name="edit" value="edit"><br>-->
<!--        <a href="../index.php">back</a>-->
<!--    </form>-->
</div>
</body>
</html>