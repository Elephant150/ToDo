<?php
include '../db.php';
?>
<?php
$edit = $_GET['edit'];
$sth = $dbh->prepare("SELECT * FROM tasks where id=$edit");
$sth->execute();
$res = $sth->fetchAll();

foreach ($res as $re) {
    $id = $re['id'];
    $name = $re['task'];
    $chb = $re['chb'];
}
//редагування таска
if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $name = $_POST['taskName'];
    $chb = $_POST['chb'];

    $stmt = $dbh->prepare("UPDATE `tasks` SET  `task` = '$name', `chb` = '$chb' WHERE `tasks`.`id` = $id");
    $stmt->execute();
    header("location: ../tasks.php?id=$_COOKIE[tid]");
}

if (isset($_GET['id'])) {
    setcookie('tid', $_GET['id']);
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <title>ToDo</title>
</head>
<body>
<div class="container">
    <h1><a href="../index.php"><i title="Back to the lists?" class="fas fa-arrow-left arrow"></i></a>Edit task</h1>
    <form method="post">
        <div class="mb-2">
            <input type="hidden" name="id" value="<?= $id; ?>">
            <div class="input-group mb-3">
                <input type="text" name="taskName" class="form-control" placeholder="enter a mame for the list"
                       value="<?= $name; ?>" required>
                <div>
                    <div class="input-group-text">
                        <?php
                        if ($chb == 1) {
                            echo '<input type="checkbox" value="1" name="chb" checked>';
                        } else {
                            echo '<input type="checkbox"   name="chb" value="1">';
                        }
                        ?>
                    </div>
                </div>
                <button type="submit" name="edit" class="btn btn-dark mb-2 spaces">Edit task</button>
            </div>
        </div>
    </form>
</div>
</body>
</html>