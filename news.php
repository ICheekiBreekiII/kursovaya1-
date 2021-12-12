<?php

class News{
	
	private  $conn;
	private  $table_NAME = "news";
	
	public $id;
	public $NEWS;
	
	public function __construct($db) {
		$this->conn = $db;
	}
	
	
	
	function read() {
		
		$query = "SELECT `NEWS` FROM ".$this->table_NAME;
		
		$stmt = $this->conn->prepare($query);
		
		$stmt->execute();
		
		return $stmt;
		
	}
	
	
}
?>