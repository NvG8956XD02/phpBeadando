<?php
class Urlap{
    private $mezok = array();
    protected $feldolgozoProgram; // meghivandó program
    private $elkuld; //A komb ami submitel

    public function __construct($feldolgozoProgram, $elkuld){
        $this->elkuld = $elkuld;
        $this->feldolgozoProgram = $feldolgozoProgram;
    }

    public function mezotFelvesz($id,$name, $value, $type){
        $sor = array("id" => $id,"name" => $name, "value" => $value, "type" => $type);
        array_push($this->mezok, $sor);
    }
    public function __toString(){
        $s = "<form method='POST' action='".$this->feldolgozoProgram."'>";
        $s .= "<table><tbody>";
        for ($i=0; $i < count($this->mezok); $i++) { 
            if($this->mezok[$i]['type'] != 'option')
                $s .= "<tr><td><label><b>".$this->mezok[$i]['value']." </b></label></td> <td><input type='".$this->mezok[$i]['type']."' name='".$this->mezok[$i]['name']."' id='".$this->mezok[$i]['id']."' /></td></tr>";
            else{
                $s .= "<tr><td><label><b> ".$this->mezok[$i]['name']." </b></label></td>";
                $s .= "<td><select id=".$this->mezok[$i]['id']." name=".$this->mezok[$i]['id'].">";
                for ($j=0; $j < count($this->mezok[$i]['value']); $j++) { 
                    $s .= "<option value=".$this->mezok[$i]['value'][$j][0]." >";
                        $s .= "".$this->mezok[$i]['value'][$j][0];
                        $s .= "</option>"; 
                }
                $s .= "</select></td></tr>";
            }
        }
        $s .= "<tr><td><input type='submit' name='$this->elkuld' id='$this->elkuld' value='$this->elkuld' /></td></tr>";
        $s .= "</tbody></table>";
        $s .= "</form>";
        return $s;
    }
}
?>