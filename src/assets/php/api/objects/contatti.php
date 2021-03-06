<?php
class Contatti {
 
    // database connection and table name
    private $conn;
    private $table_name = "contatti";
 
    // object properties
    public $id;
    public $column_position;
    public $contact_name;
    public $contact_address;
    public $contact_role;
    public $contact_phone;
    public $contact_secondary_phone;
    public $contact_mail;
    public $contact_secondary_mail;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
	
	// read contatti
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
					column_position = :column_position, 
					contact_name = :contact_name, 
					contact_address = :contact_address, 
					contact_role = :contact_role, 
					contact_phone = :contact_phone, 
					contact_secondary_phone = :contact_secondary_phone, 
					contact_mail = :contact_mail, 
					contact_secondary_mail = :contact_secondary_mail";
	 
		// prepare query
		$stmt = $this->conn->prepare($query);
	 
		// sanitize => remove html tags with strip_tags and convert special html chars with htmlspecialchars
		$this->column_position=htmlspecialchars(strip_tags($this->column_position));
		$this->contact_name=htmlspecialchars(strip_tags($this->contact_name));
		$this->contact_address=htmlspecialchars(strip_tags($this->contact_address));
		$this->contact_role=htmlspecialchars(strip_tags($this->contact_role));
		$this->contact_phone=htmlspecialchars(strip_tags($this->contact_phone));
		$this->contact_secondary_phone=htmlspecialchars(strip_tags($this->contact_secondary_phone));
		$this->contact_mail=htmlspecialchars(strip_tags($this->contact_mail));
		$this->contact_secondary_mail=htmlspecialchars(strip_tags($this->contact_secondary_mail));
	 
		// bind values
		$stmt->bindParam(":column_position", $this->column_position, PDO::PARAM_STR);
		$stmt->bindParam(":contact_name", $this->contact_name, PDO::PARAM_STR);
		$stmt->bindParam(":contact_address", $this->contact_address, PDO::PARAM_STR);
		$stmt->bindParam(":contact_role", $this->contact_role, PDO::PARAM_INT);
		$stmt->bindParam(":contact_phone", $this->contact_phone, PDO::PARAM_STR);
		$stmt->bindParam(":contact_secondary_phone", $this->contact_secondary_phone, PDO::PARAM_STR);
		$stmt->bindParam(":contact_mail", $this->contact_mail, PDO::PARAM_STR);
		$stmt->bindParam(":contact_secondary_mail", $this->contact_secondary_mail, PDO::PARAM_STR);
	 
		// execute query
		if($stmt->execute()){
			return true;
		}
	 
		return false;
		 
	}
	
	// used when filling up the update product form
	function readOne(){
	 
		// query to read single record
		$query = "SELECT * FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";
	 
		// prepare query statement
		$stmt = $this->conn->prepare( $query );
	 
		// bind id of product to be updated
		$stmt->bindParam(1, $this->id);
	 
		// execute query
		$stmt->execute();
	 
		// get retrieved row
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
	 
		// set values to object properties
		$this->column_position = $row['column_position'];
		$this->contact_name = $row['contact_name'];
		$this->contact_address = $row['contact_address'];
		$this->contact_role = $row['contact_role'];
		$this->contact_phone = $row['contact_phone'];
		$this->contact_secondary_phone = $row['contact_secondary_phone'];
		$this->contact_mail = $row['contact_mail'];
		$this->contact_secondary_mail = $row['contact_secondary_mail'];
	}
	
	// update the product
	function update(){
	 
		// update query
		$query = "UPDATE " . $this->table_name . 
				 " SET
					column_position = :column_position, 
					contact_name = :contact_name, 
					contact_address = :contact_address, 
					contact_role = :contact_role, 
					contact_phone = :contact_phone, 
					contact_secondary_phone = :contact_secondary_phone, 
					contact_mail = :contact_mail, 
					contact_secondary_mail = :contact_secondary_mail
				WHERE
					id = :id";
	 
		// prepare query statement
		$stmt = $this->conn->prepare($query);
	 
		// sanitize => remove html tags with strip_tags and convert special html chars with htmlspecialchars
		$this->column_position=htmlspecialchars(strip_tags($this->column_position));
		$this->contact_name=htmlspecialchars(strip_tags($this->contact_name));
		$this->contact_address=htmlspecialchars(strip_tags($this->contact_address));
		$this->contact_role=htmlspecialchars(strip_tags($this->contact_role));
		$this->contact_phone=htmlspecialchars(strip_tags($this->contact_phone));
		$this->contact_secondary_phone=htmlspecialchars(strip_tags($this->contact_secondary_phone));
		$this->contact_mail=htmlspecialchars(strip_tags($this->contact_mail));
		$this->contact_secondary_mail=htmlspecialchars(strip_tags($this->contact_secondary_mail));
		$this->id=htmlspecialchars(strip_tags($this->id));
	 
		// bind new values
		$stmt->bindParam(":column_position", $this->column_position, PDO::PARAM_STR);
		$stmt->bindParam(":contact_name", $this->contact_name, PDO::PARAM_STR);
		$stmt->bindParam(":contact_address", $this->contact_address, PDO::PARAM_STR);
		$stmt->bindParam(":contact_role", $this->contact_role, PDO::PARAM_INT);
		$stmt->bindParam(":contact_phone", $this->contact_phone, PDO::PARAM_STR);
		$stmt->bindParam(":contact_secondary_phone", $this->contact_secondary_phone, PDO::PARAM_STR);
		$stmt->bindParam(":contact_mail", $this->contact_mail, PDO::PARAM_STR);
		$stmt->bindParam(":contact_secondary_mail", $this->contact_secondary_mail, PDO::PARAM_STR);
		$stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
	 
		// execute the query
		if($stmt->execute()){
			return true;
		}
	 
		return false;
	}
	
	// delete the product
	function delete(){
	 
		// delete query
		$query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
	 
		// prepare query
		$stmt = $this->conn->prepare($query);
	 
		// sanitize
		$this->id=htmlspecialchars(strip_tags($this->id));
	 
		// bind id of record to delete
		$stmt->bindParam(1, $this->id);
	 
		// execute query
		if($stmt->execute()){
			return true;
		}
	 
		return false;
	}
	
	// used for paging contatti
	public function count(){
		$query = "SELECT COUNT(*) as total_rows FROM " . $this->table_name . "";
	 
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
	 
		return $row['total_rows'];
	}
	
/* 	// search contatti
	function search($keywords){
	 
		// select all query
		$query = "SELECT
					c.name as category_name, p.id, p.name, p.contact_address, p.contact_name, p.contact_role, p.contact_phone
				FROM
					" . $this->table_name . " p
					LEFT JOIN
						categories c
							ON p.contact_role = c.id
				WHERE
					p.name LIKE ? OR p.contact_address LIKE ? OR c.name LIKE ?
				ORDER BY
					p.contact_phone DESC";
	 
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
	
	// read contatti with pagination
	public function readPaging($from_record_num, $records_per_page){
	 
		// select query
		$query = "SELECT
					c.name as category_name, p.id, p.name, p.contact_address, p.contact_name, p.contact_role, p.contact_phone
				FROM
					" . $this->table_name . " p
					LEFT JOIN
						categories c
							ON p.contact_role = c.id
				ORDER BY p.contact_phone DESC
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