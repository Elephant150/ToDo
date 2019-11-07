<?php
//include 'db.php';
//
//if (isset($_GET['page'])) {
//    $page = $_GET['page'];
//} else {
//    $page = 1;
//}
//
//$notesOnPage = 2;
//$from = ($page - 1) * $notesOnPage;
//
//$sth = $dbh->prepare("SELECT COUNT(*) FROM lists order by id desc ");
//$sth->execute();
//$res = $sth->fetchAll();
//
//foreach ($res as $elem){
//    foreach ($elem as $num){
//        $pageCount = ceil($num / $notesOnPage);
//    }
//}
//
//$sth = $dbh->prepare("SELECT * FROM lists  order by id desc LIMIT $from,$notesOnPage  ");
//$sth->execute();
//$res = $sth->fetchAll();
