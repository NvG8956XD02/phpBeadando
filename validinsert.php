<?php
        require_once("!Classes/mysql.php");
?>
<?php
$db = new Mysql("proba");

if(isset($_POST['rog'])){

    $nev = $_POST['nev'];
    $tan = $_POST['tan'];
    if($_POST['dat'] == ""){
        $datum = date("Y-m-d");
    }
    else{ $datum = $_POST['dat']; }
    $jegy = $_POST['jegy'];

    //echo "INSERT INTO osztalyzat VALUES(NULL,$nev,$tan,'{$datum}',$jegy);";
    $db->nonQuery("INSERT INTO osztalyzat VALUES(NULL,$nev,$tan,'{$datum}',$jegy);");
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}else{
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}
?>