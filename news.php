<?php

class News{
	
	private  $conn;
	private  $table_NAME = "news1";
	
	public $id;
	public $NEWS;
	
	public function __construct($db) {
		$this->conn = $db;
	}
	
	function create() {
		
        $query = "INSERT INTO ".$this->table_NAME. " (`NEWS`) VALUES (:NEWS)";		
		
		$stmt = $this->conn->prepare($query);

		$this->NEWS = htmlspecialchars(strip_tags($this->NEWS));
		
		$stmt->bindParam(":NEWS", $this->NEWS);
		
		if ($stmt->execute()) {
			return true;
		}
		
		return false;
	}
	
	function read() {
		
		$query = "SELECT `NEWS` FROM ".$this->table_NAME;
		
		$stmt = $this->conn->prepare($query);
		
		$stmt->execute();
		
		return $stmt;
		
	}
	
	function delete() {
		
        $query = "DELETE FROM " . $this->table_NAME . " WHERE `ID` = ?";
		
		$stmt = $this->conn->prepare($query);
		
		$this->id= htmlspecialchars(strip_tags($this->id));
		
		$stmt->bindParam(1, $this->id);
		
		if ($stmt->execute()) {
			return true;
		}
		
		return false;
	}

	
	function update() {
		
        $query = "UPDATE ".$this->table_NAME. " SET `NEWS`=:NEWS WHERE id = :id";
		
		$stmt = $this->conn->prepare($query);
		
		$this->NEWS = htmlspecialchars(strip_tags($this->NEWS));
		
		$stmt->bindParam(":NEWS", $this->NEWS);	
		
		if ($stmt->execute()) {
			return true;
		}
		
		return false;
	} 
	
	
}
?>