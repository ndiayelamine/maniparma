<?php
class ProgettiMedia{
 
    // database connection and table name
    private $conn;
    private $table_name = "progetti_media";
 
    // object properties
    public $media_id;
    public $title;
    public $video_url;
    public $image_url;
    public $progetti_id;
    public $position;
    public $media_type;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
	
	// read progetti_media
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
					title=:title, 
					video_url=:video_url, 
					image_url=:image_url, 
					progetti_id=:progetti_id, 
					position=:position,
					media_type=:media_type";
	 
		// prepare query
		$stmt = $this->conn->prepare($query);
	 
		// sanitize => remove html tags with strip_tags and convert special html chars with htmlspecialchars
		$this->title=htmlspecialchars(strip_tags($this->title));
		$this->video_url=htmlspecialchars(strip_tags($this->video_url));
		$this->image_url=htmlspecialchars(strip_tags($this->image_url));
		$this->progetti_id=htmlspecialchars(strip_tags($this->progetti_id));
		$this->position=htmlspecialchars(strip_tags($this->position));
		$this->media_type=htmlspecialchars(strip_tags($this->media_type));
	 
		// bind values
		$stmt->bindParam(":title", $this->title, PDO::PARAM_STR);
		$stmt->bindParam(":video_url", $this->video_url, PDO::PARAM_STR);
		$stmt->bindParam(":image_url", $this->image_url, PDO::PARAM_STR);
		$stmt->bindParam(":progetti_id", $this->progetti_id, PDO::PARAM_INT);
		$stmt->bindParam(":position", $this->position, PDO::PARAM_STR);
		$stmt->bindParam(":media_type", $this->media_type, PDO::PARAM_STR);
	 
		// execute query
		if($stmt->execute()){
			return true;
		}
	 
		return false;
		 
	}
	
	// used when filling up the update product form
	function readOne(){
	 
		// query to read single record
		$query = "SELECT * FROM " . $this->table_name . " WHERE media_id = ? LIMIT 0,1";
	 
		// prepare query statement
		$stmt = $this->conn->prepare( $query );
	 
		// bind media_id of product to be updated
		$stmt->bindParam(1, $this->media_id);
	 
		// execute query
		$stmt->execute();
	 
		// get retrieved row
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
	 
		// set values to object properties
		$this->title = $row['title'];
		$this->video_url = $row['video_url'];
		$this->image_url = $row['image_url'];
		$this->progetti_id = $row['progetti_id'];
		$this->position = $row['position'];
		$this->media_type = $row['media_type'];
	}
	
	// read progetti_media
	function readProgettiMedia(){
	 
		// select all query
		$query = "SELECT * FROM " . $this->table_name . " WHERE progetti_id = ?";
		// prepare query statement
		$stmt = $this->conn->prepare($query);
		
		// bind progetti_id of product to be updated
		$stmt->bindParam(1, $this->progetti_id);
		
		// execute query
		$stmt->execute();
	 
		return $stmt;
	}
	
	// update the product
	function update(){
	 
		// update query
		$query = "UPDATE " . $this->table_name . "
				SET
					title=:title, 
					video_url=:video_url, 
					image_url=:image_url, 
					progetti_id=:progetti_id, 
					position=:position,
					media_type=:media_type
				WHERE
					media_id = :media_id";
	 
		// prepare query statement
		$stmt = $this->conn->prepare($query);
	 
		// sanitize
		$this->title=htmlspecialchars(strip_tags($this->title));
		$this->video_url=htmlspecialchars(strip_tags($this->video_url));
		$this->image_url=htmlspecialchars(strip_tags($this->image_url));
		$this->progetti_id=htmlspecialchars(strip_tags($this->progetti_id));
		$this->position=htmlspecialchars(strip_tags($this->position));
		$this->media_type=htmlspecialchars(strip_tags($this->media_type));
		$this->media_id=htmlspecialchars(strip_tags($this->media_id));
	 
		// bind new values
		$stmt->bindParam(":title", $this->title, PDO::PARAM_STR);
		$stmt->bindParam(":video_url", $this->video_url, PDO::PARAM_STR);
		$stmt->bindParam(":image_url", $this->image_url, PDO::PARAM_STR);
		$stmt->bindParam(":progetti_id", $this->progetti_id, PDO::PARAM_INT);
		$stmt->bindParam(":position", $this->position, PDO::PARAM_STR);
		$stmt->bindParam(":media_type", $this->media_type, PDO::PARAM_STR);
		$stmt->bindParam(':media_id', $this->media_id, PDO::PARAM_INT);
	 
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
	
	// used for paging progetti_media
	public function count(){
		$query = "SELECT COUNT(*) as total_rows FROM " . $this->table_name . "";
	 
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
	 
		return $row['total_rows'];
	}
	
	/* // search progetti_media
	function search($keywords){
	 
		// select all query
		$query = "SELECT
					c.name as category_name, media_id, p.name, p.description, p.price, p.category_id, p.created
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
	
	// read progetti_media with pagination
	public function readPaging($from_record_num, $records_per_page){
	 
		// select query
		$query = "SELECT
					c.name as category_name, media_id, p.name, p.description, p.price, p.category_id, p.created
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