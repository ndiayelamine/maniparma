<?php
class Partners{
 
    // database connection and table name
    private $conn;
    private $table_name = "partners";
 
    // object properties
    public $id;
    public $column_position;
    public $column_title;
    public $column_link;
    public $column_link_open;
	public $img_url;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
	
	// read partners
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
		$query = "INSERT INTO " . $this->table_name . "
				SET
					column_position=:column_position, 
					column_title=:column_title, 
					column_link=:column_link, 
					column_link_open=:column_link_open,
					img_url=:img_url";
	 
		// prepare query
		$stmt = $this->conn->prepare($query);
	 
		// sanitize => remove html tags with strip_tags and convert special html chars with htmlspecialchars
		$this->column_position=htmlspecialchars(strip_tags($this->column_position));
		$this->column_title=htmlspecialchars(strip_tags($this->column_title));
		$this->column_link=htmlspecialchars(strip_tags($this->column_link));
		$this->column_link_open=htmlspecialchars(strip_tags($this->column_link_open));
		$this->img_url=htmlspecialchars(strip_tags($this->img_url));
	 
		// bind values
		$stmt->bindParam(":column_position", $this->column_position, PDO::PARAM_STR);
		$stmt->bindParam(":column_title", $this->column_title, PDO::PARAM_STR);
		$stmt->bindParam(":column_link", $this->column_link, PDO::PARAM_STR);
		$stmt->bindParam(":column_link_open", $this->column_link_open, PDO::PARAM_STR);
		$stmt->bindParam(":img_url", $this->img_url, PDO::PARAM_STR);
	 
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
		$this->column_title = $row['column_title'];
		$this->column_link = $row['column_link'];
		$this->column_link_open = $row['column_link_open'];
		$this->img_url = $row['img_url'];
	}
	
	// update the product
	function update(){
	 
		// update query
		$query = "UPDATE " . $this->table_name . "
				SET
					column_position=:column_position, 
					column_title=:column_title, 
					column_link=:column_link, 
					column_link_open=:column_link_open,
					img_url=:img_url
				WHERE
					id = :id";
	 
		// prepare query statement
		$stmt = $this->conn->prepare($query);
	 
		// sanitize
		$this->column_position=htmlspecialchars(strip_tags($this->column_position));
		$this->column_title=htmlspecialchars(strip_tags($this->column_title));
		$this->column_link=htmlspecialchars(strip_tags($this->column_link));
		$this->column_link_open=htmlspecialchars(strip_tags($this->column_link_open));
		$this->img_url=htmlspecialchars(strip_tags($this->img_url));
		$this->id=htmlspecialchars(strip_tags($this->id));
	 
		// bind new values
		$stmt->bindParam(":column_position", $this->column_position, PDO::PARAM_STR);
		$stmt->bindParam(":column_title", $this->column_title, PDO::PARAM_STR);
		$stmt->bindParam(":column_link", $this->column_link, PDO::PARAM_STR);
		$stmt->bindParam(":column_link_open", $this->column_link_open, PDO::PARAM_STR);
		$stmt->bindParam(":img_url", $this->img_url, PDO::PARAM_STR);
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
	
	// used for paging partners
	public function count(){
		$query = "SELECT COUNT(*) as total_rows FROM " . $this->table_name . "";
	 
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
	 
		return $row['total_rows'];
	}
	
	/* // search partners
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
	
	// read partners with pagination
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