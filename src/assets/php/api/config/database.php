<?php
class Database{
 
    // Configurazione localhost
    private $host = "localhost";
    private $db_name = "maniparma";
    private $username = "root";
    private $password = "";

    // Configurazione localhost
    // private $host = "62.149.150.177"; // => "mysql.aruba.it";
    // private $db_name = "Sql934546_1";
    // private $username = "Sql934546";
    // private $password = "jid8c08x0y";
	
	public $conn;
	
    // get the database connection
    public function getConnection(){
 
        $this->conn = null;
 
        try{
			/* Mi collego al db */
			//$this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
			
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
 
        return $this->conn;
    }
}
?>
