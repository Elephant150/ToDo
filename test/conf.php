<script>
    $(function () {
        $('select[name="item"]').change(function () {
            alert($('select[name="item"').val());
        });
    });
</script>
<?php
require_once 'db.php';

if (isset($_POST['id']) && !empty($_POST['id'])){
    $id = intval($_POST['id']);
    $query = $db->query("SELECT * FROM `item` WHERE `list_id` = $id");
    echo "<select name='item'>";
    while ($row = $query->fetch()){
        echo "<option>{$row->task}</option>";
    }
    echo "</select>";
}else{
    echo "<select name='item' disabled><option value='0'>---Item---</option></select>";
}