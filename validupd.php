<?php
        require_once("!Classes/mysql.php");
?>
<?php
    $db = new Mysql("proba");

    if(isset($_POST['mod'])){

        $id = $_POST['id'];
        $nev = $_POST['nev'];
        $tan = $_POST['tan'];
        $datum = $_POST['dat'];
        $jegy = $_POST['jegy'];
        
        //echo $sql = "UPDATE osztalyzat SET tanuloID = $nev , tantargyID = $tan, datum = '".date($datum)."' , jegy = {$jegy} WHERE id = {$id}";
        $db->nonQuery("UPDATE osztalyzat SET tanuloID = $nev , tantargyID = $tan, datum = '".date($datum)."' , jegy = {$jegy} WHERE id = {$id}");
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }else{
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
?>