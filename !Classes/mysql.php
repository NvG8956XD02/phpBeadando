<?php
class mysql
{
    protected $conn;
	protected $query;
    protected $show_errors = TRUE;
	public $results;

    public function __construct($database){
        $this->conn = new mysqli("localhost","root","",$database,"3306");
        if($this->conn->connect_error)
            $this->error('A csatlakozás meghiusult :'.$this->conn->connect_error);
        $this->conn->set_charset('utf8');
    }

    public function queryNUMERIC($sql){
        $that=$this->conn->query($sql);
        while($results[] = $that->fetch_array(MYSQLI_NUM));
        unset($results[count($results)-1]);
        return $results;
    }

    public function nonQuery($sql)
    {
        $this->conn->query($sql);
    }

    public function queryASSOC($sql){
        $that=$this->conn->query($sql);
        while($results[] = $that->fetch_array(MYSQLI_ASSOC));
        unset($results[count($results)-1]);
        return $results;
    }
    
    public function error($error) {
        if ($this->show_errors) {
            exit($error);
        }
    }
}
?>