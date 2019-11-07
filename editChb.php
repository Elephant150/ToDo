<?php
include 'db.php';
?>
<?php
$edit = $_GET['edit'];
$sth = $dbh->prepare("SELECT * FROM chb where id=$edit");
$sth->execute();
$res = $sth->fetchAll();

foreach ($res as $re) {
    $id = $re['id'];
    $chb = $re['chb'];
}

if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $chb = $_POST['chb'];

    $stmt = $dbh->prepare("UPDATE `chb` SET  `chb` = '$chb' WHERE `chb`.`id` = $id");
    $stmt->execute();
    header("location: index.php");
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
    <input type="hidden" name="id" value="<?= $id; ?>"><br>
    <?php
    if ($chb == 1) {
        echo '<input type="checkbox" value="1" name="chb" checked>';
    } else {
        echo '<input type="checkbox"   name="chb" value="1">';
    }
    ?>
    <input type="submit" name="edit" value="edit"><br>
    <a href="index.php">back</a>
</form>
</body>
</html>