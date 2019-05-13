<?php
class Database{
 
    // Configurazione localhost
    private $host = "localhost";
    private $db_name = "maniparma";
    private $username = "root";
    private $password = "";
	
	/* Configurazione server host */
	/*private $db_name = "msenegae_maniparma";
	private $host = "www.senegalesidiparma.it:3306";
	private $username = "msenegae_lamine";
	private $password = "001992";*/

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
