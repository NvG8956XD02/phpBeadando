<?php
    require_once("!Classes/mysql.php");
?>
<?php
    $delID = $_POST['del_id'];
    $db = new Mysql("proba");

    $delSQL = 'DELETE FROM osztalyzat WHERE id='.$delID.' LIMIT 1';
    $db->nonQuery($delSQL);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
?>