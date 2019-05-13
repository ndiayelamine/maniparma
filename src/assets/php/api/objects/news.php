<?php
class News{
 
    // database connection and table name
    private $conn;
    private $table_name = "news";
 
    // object properties
    public $news_id;
    public $title;
    public $seo_title;
    public $long_content;
    public $data;
    public $news_link;
    public $news_link_open;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
	
	// read news
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
					seo_title=:seo_title, 
					long_content=:long_content, 
					data=:data, 
					news_link=:news_link, 
					news_link_open=:news_link_open";
	 
		// prepare query
		$stmt = $this->conn->prepare($query);
	 
		// sanitize => remove html tags with strip_tags and convert special html chars with htmlspecialchars
		$this->title=htmlspecialchars(strip_tags($this->title));
		$this->seo_title=htmlspecialchars(strip_tags($this->seo_title));
		$this->long_content=htmlspecialchars(strip_tags($this->long_content));
		$this->data=htmlspecialchars(strip_tags($this->data));
		$this->news_link=htmlspecialchars(strip_tags($this->news_link));
		$this->news_link_open=htmlspecialchars(strip_tags($this->news_link_open));
	 
		// bind values
		$stmt->bindParam(":title", $this->title, PDO::PARAM_STR);
		$stmt->bindParam(":seo_title", $this->seo_title, PDO::PARAM_STR);
		$stmt->bindParam(":long_content", $this->long_content, PDO::PARAM_STR);
		$stmt->bindParam(":data", $this->data, PDO::PARAM_STR);
		$stmt->bindParam(":news_link", $this->news_link, PDO::PARAM_STR);
		$stmt->bindParam(":news_link_open", $this->news_link_open, PDO::PARAM_STR);
	 
		// execute query
		if($stmt->execute()){
			return true;
		}
	 
		return false;
	}
	
	// used when filling up the update product form
	function readOne(){
	 
		// query to read single record
		$query = "SELECT * FROM " . $this->table_name . " WHERE news_id = ? LIMIT 0,1";
	 
		// prepare query statement
		$stmt = $this->conn->prepare( $query );
	 
		// bind id of product to be updated
		$stmt->bindParam(1, $this->news_id);
	 
		// execute query
		$stmt->execute();
	 
		// get retrieved row
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
	 
		// set values to object properties
		$this->title = $row['title'];
		$this->seo_title = $row['seo_title'];
		$this->long_content = $row['long_content'];
		$this->data = $row['data'];
		$this->news_link = $row['news_link'];
		$this->news_link_open = $row['news_link_open'];
	}
	
	// update the product
	function update(){
	 
		// update query
		$query = "UPDATE " . $this->table_name . "
				SET
					title=:title, 
					seo_title=:seo_title, 
					long_content=:long_content, 
					data=:data, 
					news_link=:news_link, 
					news_link_open=:news_link_open
				WHERE
					news_id = :news_id";
	 
		// prepare query statement
		$stmt = $this->conn->prepare($query);
	 
		// sanitize
		$this->title=htmlspecialchars(strip_tags($this->title));
		$this->seo_title=htmlspecialchars(strip_tags($this->seo_title));
		$this->long_content=htmlspecialchars(strip_tags($this->long_content));
		$this->data=htmlspecialchars(strip_tags($this->data));
		$this->news_link=htmlspecialchars(strip_tags($this->news_link));
		$this->news_link_open=htmlspecialchars(strip_tags($this->news_link_open));
		$this->news_id=htmlspecialchars(strip_tags($this->news_id));
	 
		// bind new values
		$stmt->bindParam(":title", $this->title, PDO::PARAM_STR);
		$stmt->bindParam(":seo_title", $this->seo_title, PDO::PARAM_STR);
		$stmt->bindParam(":long_content", $this->long_content, PDO::PARAM_STR);
		$stmt->bindParam(":data", $this->data, PDO::PARAM_STR);
		$stmt->bindParam(":news_link", $this->news_link, PDO::PARAM_STR);
		$stmt->bindParam(":news_link_open", $this->news_link_open, PDO::PARAM_STR);
		$stmt->bindParam(':news_id', $this->news_id, PDO::PARAM_INT);
	 
		// execute the query
		if($stmt->execute()){
			return true;
		}
	 
		return false;
	}
	
	// delete the product
	function delete(){
	 
		// delete query
		$query = "DELETE FROM " . $this->table_name . " WHERE news_id = ?";
	 
		// prepare query
		$stmt = $this->conn->prepare($query);
	 
		// sanitize
		$this->news_id=htmlspecialchars(strip_tags($this->news_id));
	 
		// bind id of record to delete
		$stmt->bindParam(1, $this->news_id);
	 
		// execute query
		if($stmt->execute()){
			return true;
		}
	 
		return false;
		 
	}
	
	// used for paging news
	public function count(){
		$query = "SELECT COUNT(*) as total_rows FROM " . $this->table_name . "";
	 
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
	 
		return $row['total_rows'];
	}
	
	/* // search news
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
	
	// read news with pagination
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