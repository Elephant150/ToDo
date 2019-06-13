<?php
try{
$db = new PDO("mysql:dbname=todo;host=tom","root","", array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8",
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
    PDO::ATTR_ERRMODE => true
));
}catch (PDOException $e){
    die($e->getMessage());
}