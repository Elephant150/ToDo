<?php
$todo = $connect->query(/** @lang text */ "SELECT * FROM psaradise.todo ORDER BY date DESC");
$todo = $todo->fetchAll(PDO::FETCH_ASSOC);

if($todo){

    foreach ($todo as $val){
        ?>
        <ul class="hr">
            <?="<u><li class='date'>{$val['date']} </li></u>
        <strong><li class='text'>{$val['text']} </li></strong>" ?>
        </ul>
    <? }}?>
