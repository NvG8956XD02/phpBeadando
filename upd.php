<?php
    require_once("!Classes/mysql.php");
?>
<?php
    //Kezdés
    $updCountID = $_GET['rn'];
    $db = new Mysql("proba");

    $sql = "SELECT osztalyzat.id ,tanulo.nev as nev, tantargy.nev as tan, datum, jegy FROM osztalyzat INNER JOIN tanulo on osztalyzat.tanuloID = tanulo.id INNER JOIN tantargy on osztalyzat.tantargyID = tantargy.id WHERE osztalyzat.id = ".$updCountID;
    $result2 = $db->queryASSOC($sql);

    //Átalakítósdi
    $sql = "SELECT tantargy.id,tantargy.nev FROM tantargy";
    $tantargy = $db->queryASSOC($sql);

    $sql = "SELECT tanulo.id,tanulo.nev FROM tanulo";
    $tanulok = $db->queryASSOC($sql);

        $s = "<form method='POST' action='validupd.php'>";
        $s .= "<table><thead><input type='hidden' name='id' value=".$result2[0]['id']."></thead><tbody>";
        $s .= "<tr><td>Név</td><td><select name='nev'>";
        for($i = 0; $i < count($tanulok); ++$i){
            if($tanulok[$i]['nev'] == $result2[0]['nev']){
                $s.= "<option value='".$tanulok[$i]['id']."' selected>".$tanulok[$i]['nev']."</option>";
            }
            else{
                $s.= "<option value='".$tanulok[$i]['id']."'>".$tanulok[$i]['nev']."</option>";
            }
        };
        $s .= "</select></td></tr>";
        $s .= "<tr><td>Tantárgy</td><td><select name='tan'>";
        for($i = 0; $i < count($tantargy); ++$i){
            if($tantargy[$i]['nev'] == $result2[0]['tan']){
                $s.= "<option value='".$tantargy[$i]['id']."' selected>".$tantargy[$i]['nev']."</option>";
            }
            else{
                $s.= "<option value='".$tantargy[$i]['id']."'>".$tantargy[$i]['nev']."</option>";
            }
        }
        $s .= "</select></td></tr>";
        $s .= "<tr><td>Dátum</td> <td><input type='date' name='dat' id='dat' value='".$result2[0]['datum']."'></td></tr>";
        $s .= "<tr><td>Érdemjegy</td><td><select name='jegy'>";
        for($i = 1; $i <= 5; ++$i){
            if($i == $result2[0]['jegy']){
                $s.= "<option value='".$i."' selected>".$i."</option>";
            }else{
                $s.= "<option value='".$i."'>".$i."</option>";
            }
        }
        $s .= "</select></td></tr>";
        $s .= "<tr><td><input type='submit' name='mod' id='mod' value='Modosítás' /></td></tr>";
        $s .= "</tbody></table>";
        $s .= "</form>";
        echo $s;
?>