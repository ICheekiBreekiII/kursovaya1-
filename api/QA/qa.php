<?php

class Qa{
	
	private  $conn;
	private  $table_NAME = "qa";
	
	public $id;
	public $QA;
	
	public function __construct($db) {
		$this->conn = $db;
	}
	
	
	
	function read() {
		
		$query = "SELECT `QA` FROM ".$this->table_NAME;
		
		$stmt = $this->conn->prepare($query);
		
		$stmt->execute();
		
		return $stmt;
		
	}
	
	
}
?>