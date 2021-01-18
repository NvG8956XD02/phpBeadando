<?php
class tabla
{
 protected $border;
 protected $adatok = array(array());

 public function __construct($border, $adatok){
   $this->border = $border;
   $this->adatok = $adatok;
 }

 public function __destruct(){
   echo " ...The End ";
 }

 public function sor_adatbeszur($hova, $mit){
    $adatok[$hova] .= $mit;
  }
 public function rajzol()
 {
   $string = "";
   $stylo= "border:".$this->border;
   $string = $string."<table style='".$stylo."'><tbody>";
     for($i = 0;$i < count($this->adatok);$i++)
     {
       $string = $string."<tr style='".$stylo."'>";
       for($j = 0;$j < count($this->adatok[$i]);$j++)
       {
         $string = $string."<td style='".$stylo."'>".$this->adatok[$i][$j]."</td>";
       }
       $string = $string."</tr>";
     }

   $string = $string."</tbody></table>";
   return $string;
 }
}
class fejlecesBOOTSTRAP extends tabla
{
  protected $fejlec = array();
  protected $classTABLE;
  protected $classTR;
  protected $classTD;
  public function __construct($classTABLE,$adatok, $fejlecem)
  {
    parent:: __construct('',$adatok);
    $this->fejlec = $fejlecem;
    $this->classTABLE = $classTABLE;
    
  }

  public function rajzol()
  {
    $string = "";
    $string = $string."<table class='".$this->classTABLE."'><tbody>";
    $string = $string."<tr>";
      for($ii = 0;$ii < count($this->fejlec);$ii++){
        $string = $string."<th scope='col'>".$this->fejlec[$ii]."</td>";
      }
    $string = $string."</tr>";
      for($i = 0;$i < count($this->adatok);$i++)
      {
        $string = $string."<tr class='".$this->classTR."'>";
        for($j = 0;$j < count($this->adatok[$i]);$j++)
        {
          $string = $string."<td>".$this->adatok[$i][$j]."</td>";
        }
        $string = $string."</tr>";
      }

    $string = $string."</tbody></table>";
    return $string;
  }
}
?>
