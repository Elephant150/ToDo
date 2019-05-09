<?php
$todo = $connect->query(/** @lang text */ "SELECT * FROM psaradise.todo ORDER BY date DESC");
$todo = $todo->fetchAll(PDO::FETCH_ASSOC);

if ($todo) {

    foreach ($todo as $val) {
        ?>
        <ul class="hr"><input type="checkbox" class="col-md-1" name="packersOff" value="1"/>
            <label class="col-md-11 strikethrough">
                <?= "<strong><li class='text'>{$val['text']} </li></strong>
            <br>
            <u><li class='date'>{$val['date']} </li></u>" ?>
            </label></ul>
    <? }
} ?>
