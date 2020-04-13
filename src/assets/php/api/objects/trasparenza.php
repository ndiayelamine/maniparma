<?php
class Trasparenza{
 
    // database connection and table name
    private $conn;
    private $table_name = "trasparenza";
 
    // object properties
    public $trasparenzaId;
    public $title;
    public $docLink;
    public $docIcon;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
	
	// read trasparenza
	function read(){
	 
		// select all query
		$query = "SELECT * FROM " . $this->table_name;
		// prepare query statement
		$stmt = $this->conn->prepare($query);
		// execute query
		$stmt->execute();
	 
		return $stmt;
	}
	
	// create product
	function create(){
	 
		// query to insert record
		$query = "INSERT INTO " . $this->table_name . 
				 " SET
					title=:title, 
					docLink=:docLink, 
					docIcon=:docIcon";
	 
		// prepare query
		$stmt = $this->conn->prepare($query);
	 
		// sanitize => remove html tags with strip_tags and convert special html chars with htmlspecialchars
		$this->title=htmlspecialchars(strip_tags($this->title));
		$this->docLink=htmlspecialchars(strip_tags($this->docLink));
		$this->docIcon=htmlspecialchars(strip_tags($this->docIcon));
	 
		// bind values
		$stmt->bindParam(":title", $this->title, PDO::PARAM_STR);
		$stmt->bindParam(":docLink", $this->docLink, PDO::PARAM_STR);
		$stmt->bindParam(":docICon", $this->docIcon, PDO::PARAM_STR);
	 
		// execute query
		if($stmt->execute()){
			return true;
		}
	 
		return false;
	}
	
	// used when filling up the update product form
	function readOne(){
	 
		// query to read single record
		$query = "SELECT * FROM " . $this->table_name . " WHERE trasparenzaId = ? LIMIT 0,1";
	 
		// prepare query statement
		$stmt = $this->conn->prepare( $query );
	 
		// bind id of product to be updated
		$stmt->bindParam(1, $this->trasparenzaId);
	 
		// execute query
		$stmt->execute();
	 
		// get retrieved row
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
	 
		// set values to object properties
		$this->title = $row['title'];
		$this->docLink = $row['docLink'];
		$this->docIcon = $row['docIcon'];
	}
	
	// update the product
	function update(){
	 
		// update query
		$query = "UPDATE " . $this->table_name . "
				SET
					title=:title, 
					docLink=:docLink, 
					docIcon=:docIcon
				WHERE
					trasparenzaId = :trasparenzaId";
	 
		// prepare query statement
		$stmt = $this->conn->prepare($query);
	 
		// sanitize
		$this->title=htmlspecialchars(strip_tags($this->title));
		$this->docLink=htmlspecialchars(strip_tags($this->docLink));
		$this->docIcon=htmlspecialchars(strip_tags($this->docIcon));
	 
		// bind new values
		$stmt->bindParam(":title", $this->title, PDO::PARAM_STR);
		$stmt->bindParam(":docLink", $this->docLink, PDO::PARAM_STR);
		$stmt->bindParam(":docIcon", $this->docIcon, PDO::PARAM_STR);
	 
		// execute the query
		if($stmt->execute()){
			return true;
		}
	 
		return false;
	}
	
	// delete the product
	function delete(){
	 
		// delete query
		$query = "DELETE FROM " . $this->table_name . " WHERE trasparenzaId = ?";
	 
		// prepare query
		$stmt = $this->conn->prepare($query);
	 
		// sanitize
		$this->trasparenzaId=htmlspecialchars(strip_tags($this->trasparenzaId));
	 
		// bind id of record to delete
		$stmt->bindParam(1, $this->trasparenzaId);
	 
		// execute query
		if($stmt->execute()){
			return true;
		}
	 
		return false;
		 
	}
	
	// used for paging trasparenza
	public function count(){
		$query = "SELECT COUNT(*) as total_rows FROM " . $this->table_name . "";
	 
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
	 
		return $row['total_rows'];
	}
	
	/* // search trasparenza
	function search($keywords){
	 
		// select all query
		$query = "SELECT
					c.name as category_name, p.id, p.name, p.description, p.price, p.category_id, p.created
				FROM
					" . $this->table_name . " p
					LEFT JOIN
						categories c
							ON p.category_id = c.id
				WHERE
					p.name LIKE ? OR p.description LIKE ? OR c.name LIKE ?
				ORDER BY
					p.created DESC";
	 
		// prepare query statement
		$stmt = $this->conn->prepare($query);
	 
		// sanitize
		$keywords=htmlspecialchars(strip_tags($keywords));
		$keywords = "%{$keywords}%";
	 
		// bind
		$stmt->bindParam(1, $keywords);
		$stmt->bindParam(2, $keywords);
		$stmt->bindParam(3, $keywords);
	 
		// execute query
		$stmt->execute();
	 
		return $stmt;
	}
	
	// read trasparenza with pagination
	public function readPaging($from_record_num, $records_per_page){
	 
		// select query
		$query = "SELECT
					c.name as category_name, p.id, p.name, p.description, p.price, p.category_id, p.created
				FROM
					" . $this->table_name . " p
					LEFT JOIN
						categories c
							ON p.category_id = c.id
				ORDER BY p.created DESC
				LIMIT ?, ?";
	 
		// prepare query statement
		$stmt = $this->conn->prepare( $query );
	 
		// bind variable values
		$stmt->bindParam(1, $from_record_num, PDO::PARAM_INT);
		$stmt->bindParam(2, $records_per_page, PDO::PARAM_INT);
	 
		// execute query
		$stmt->execute();
	 
		// return values from database
		return $stmt;
	} */

}
