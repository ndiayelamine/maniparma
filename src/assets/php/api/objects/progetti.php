<?php
class Progetti{
 
    // database connection and table name
    private $conn;
    private $table_name = "progetti";
 
    // object properties
    public $progetti_id;
    public $column_position;
    public $title;
    public $location;
    public $short_description;
    public $long_description;
    public $image_url;
    public $progetti_date;
    public $seo_title;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
	
	// read progetti
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
					title=:title, 
					location=:location, 
					short_description=:short_description, 
					long_description=:long_description,
					image_url=:image_url,
					progetti_date=:progetti_date,
					seo_title=:seo_title";
	 
		// prepare query
		$stmt = $this->conn->prepare($query);
	 
		// sanitize => remove html tags with strip_tags and convert special html chars with htmlspecialchars
		$this->column_position=htmlspecialchars(strip_tags($this->column_position));
		$this->title=htmlspecialchars(strip_tags($this->title));
		$this->location=htmlspecialchars(strip_tags($this->location));
		$this->short_description=htmlspecialchars(strip_tags($this->short_description));
		$this->long_description=htmlspecialchars(strip_tags($this->long_description));
		$this->image_url=htmlspecialchars(strip_tags($this->image_url));
		$this->progetti_date=htmlspecialchars(strip_tags($this->progetti_date));
		$this->seo_title=htmlspecialchars(strip_tags($this->seo_title));
	 
		// bind values
		$stmt->bindParam(":column_position", $this->column_position, PDO::PARAM_STR);
		$stmt->bindParam(":title", $this->title, PDO::PARAM_STR);
		$stmt->bindParam(":location", $this->location, PDO::PARAM_STR);
		$stmt->bindParam(":short_description", $this->short_description, PDO::PARAM_STR);
		$stmt->bindParam(":long_description", $this->long_description, PDO::PARAM_STR);
		$stmt->bindParam(":image_url", $this->image_url, PDO::PARAM_STR);
		$stmt->bindParam(":progetti_date", $this->progetti_date, PDO::PARAM_STR);
		$stmt->bindParam(":seo_title", $this->seo_title, PDO::PARAM_STR);
	 
		// execute query
		if($stmt->execute()){
			return true;
		}
	 
		return false;
		 
	}
	
	// used when filling up the update product form
	function readOne(){
	 
		// query to read single record
		$query = "SELECT * FROM " . $this->table_name . " WHERE progetti_id = ? LIMIT 0,1";
	 
		// prepare query statement
		$stmt = $this->conn->prepare( $query );
	 
		// bind id of product to be updated
		$stmt->bindParam(1, $this->progetti_id);
	 
		// execute query
		$stmt->execute();
	 
		// get retrieved row
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
	 
		// set values to object properties
		$this->column_position = $row['column_position'];
		$this->title = $row['title'];
		$this->location = $row['location'];
		$this->short_description = $row['short_description'];
		$this->long_description = $row['long_description'];
		$this->image_url = $row['image_url'];
		$this->progetti_date = $row['progetti_date'];
		$this->seo_title = $row['seo_title'];
	}
	
	// update the product
	function update(){
	 
		// update query
		$query = "UPDATE " . $this->table_name . "
				SET
					column_position=:column_position, 
					title=:title, 
					location=:location, 
					short_description=:short_description, 
					long_description=:long_description,
					image_url=:image_url,
					progetti_date=:progetti_date,
					seo_title=:seo_title
				WHERE
					progetti_id = :progetti_id";
	 
		// prepare query statement
		$stmt = $this->conn->prepare($query);
	 
		// sanitize
		$this->column_position=htmlspecialchars(strip_tags($this->column_position));
		$this->title=htmlspecialchars(strip_tags($this->title));
		$this->location=htmlspecialchars(strip_tags($this->location));
		$this->short_description=htmlspecialchars(strip_tags($this->short_description));
		$this->long_description=htmlspecialchars(strip_tags($this->long_description));
		$this->image_url=htmlspecialchars(strip_tags($this->image_url));
		$this->progetti_date=htmlspecialchars(strip_tags($this->progetti_date));
		$this->seo_title=htmlspecialchars(strip_tags($this->seo_title));
		$this->progetti_id=htmlspecialchars(strip_tags($this->progetti_id));
	 
		// bind new values
		$stmt->bindParam(":column_position", $this->column_position, PDO::PARAM_STR);
		$stmt->bindParam(":title", $this->title, PDO::PARAM_STR);
		$stmt->bindParam(":location", $this->location, PDO::PARAM_STR);
		$stmt->bindParam(":short_description", $this->short_description, PDO::PARAM_STR);
		$stmt->bindParam(":long_description", $this->long_description, PDO::PARAM_STR);
		$stmt->bindParam(":image_url", $this->image_url, PDO::PARAM_STR);
		$stmt->bindParam(":progetti_date", $this->progetti_date, PDO::PARAM_STR);
		$stmt->bindParam(":seo_title", $this->seo_title, PDO::PARAM_STR);
		$stmt->bindParam(':progetti_id', $this->progetti_id, PDO::PARAM_INT);
	 
		// execute the query
		if($stmt->execute()){
			return true;
		}
	 
		return false;
	}
	
	// used for paging progetti
	public function count(){
		$query = "SELECT COUNT(*) as total_rows FROM " . $this->table_name . "";
	 
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
	 
		return $row['total_rows'];
	}
	
	/* // delete the product
	function delete(){
	 
		// delete query
		$query = "DELETE FROM " . $this->table_name . " WHERE progetti_id = ?";
	 
		// prepare query
		$stmt = $this->conn->prepare($query);
	 
		// sanitize
		$this->progetti_id=htmlspecialchars(strip_tags($this->progetti_id));
	 
		// bind id of record to delete
		$stmt->bindParam(1, $this->progetti_id);
	 
		// execute query
		if($stmt->execute()){
			return true;
		}
	 
		return false;
		 
	}
	
	// search progetti
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
	
	// read progetti with pagination
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