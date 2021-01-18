<?php
        require_once("!Classes/mysql.php");
?>
<div>
    <?php
        $db = new Mysql("proba");

        $sql = "SELECT tantargy.id,tantargy.nev FROM tantargy";
        $tantargy = $db->queryASSOC($sql);

        $sql = "SELECT tanulo.id,tanulo.nev FROM tanulo";
        $tanulok = $db->queryASSOC($sql);


        $s = "<form method='POST' action='validinsert.php'>";
        $s .= "<table><tbody>";
        $s .= "<tr><td>Név</td><td><select name='nev'>";
        for($i = 0; $i < count($tanulok); ++$i){
            $s.= "<option value='".$tanulok[$i]['id']."'>".$tanulok[$i]['nev']."</option>";
        }
        $s .= "</select></td></tr>";
        $s .= "<tr><td>Tantárgy</td><td><select name='tan'>";
        for($i = 0; $i < count($tantargy); ++$i){
            $s.= "<option value='".$tantargy[$i]['id']."'>".$tantargy[$i]['nev']."</option>";
        }
        $s .= "</select></td></tr>";
        $s .= "<tr><td>Dátum</td> <td><input type='date' name='dat' id='dat'></td></tr>";
        $s .= "<tr><td>Érdemjegy</td><td><select name='jegy'>";
        for($i = 1; $i <= 5; ++$i){
            $s.= "<option value='".$i."'>".$i."</option>";
        }
        $s .= "</select></td></tr>";
        $s .= "<tr><td><input type='submit' name='rog' id='rog' value='Rögzítés' /></td></tr>";
        $s .= "</tbody></table>";
        $s .= "</form>";

        echo $s;
    ?>
</div>