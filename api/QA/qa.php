<?php

class Qa{
	
	private  $conn;
	private  $table_NAME = "qa1";
	
	public $id;
	public $QA;
	
	public function __construct($db) {
		$this->conn = $db;
	}
	
	
	function create() {
		
        $query = "INSERT INTO ".$this->table_NAME. " (`QA`) VALUES (:QA)";		
		
		$stmt = $this->conn->prepare($query);

		$this->QA = htmlspecialchars(strip_tags($this->QA));
		
		$stmt->bindParam(":QA", $this->QA);
		
		if ($stmt->execute()) {
			return true;
		}
		
		return false;
	}
	
	
	function read() {
		
		$query = "SELECT `QA` FROM ".$this->table_NAME;
		
		$stmt = $this->conn->prepare($query);
		
		$stmt->execute();
		
		return $stmt;
		
	}
	
	
}
?>