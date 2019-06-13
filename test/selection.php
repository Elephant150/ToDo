<?php include 'db.php'; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>selection</title>
</head>
<body>
<select name="" class="list">
    <option value="0">---Choose---</option>
    <?php
        $query = $db->query("SELECT * FROM `list`");
        while ($row = $query->fetch()){
            echo "<option value='{$row->id}'>". $row->list_name."</option>";
    }
    ?>
</select>
<span class="item"></span>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="script.js"></script>
</body>
</html>