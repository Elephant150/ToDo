<?php
include 'db.php';


//output dta
$query = $db->query("select * from lists order by id desc ")->fetchAll();
// insert new list
if (isset($_GET['list'])) {
    $list = $_GET['list'];
    $insert_list = $db->exec("insert into lists(list_name) values ('$list')");
    header('Location:index.php');
}
//delete list
if (isset($_GET['del_list'])) {
    $id = $_GET['del_list'];
    $del_list = $db->query("DELETE FROM lists WHERE id = $id");
    $del_list = $db->query("DELETE FROM tasks WHERE list_id = $id");
    header("location: index.php");
}
//edit list



//if (isset($_GET['edit_list']) && !empty($_GET['edit_list'])){
//    $id = $_GET['edit_list'];
//    $edit_list = $db->prepare("select * from lists where id = :uid");
//    $edit_list->execute(array(':uid'=>$id));
////    $edit_row = $edit_list->fetch(PDO::FETCH_ASSOC);
//    extract($edit_list);
//}
//if (isset($_POST['edit_btn_list'])) {
//    $list = $_POST['list'];
//    $list_id = $_POST['list_id'];
//    $btn_edit = $db->prepare("UPDATE lists SET list_name = '$list' WHERE id = $list_id");
//    header("location:index.php");
//}