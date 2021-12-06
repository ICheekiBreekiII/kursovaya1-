<?php

class Phones{
	
	private  $conn;
	private  $table_NAME = "phones";
	
	public $id;
	public $number;
	
	public function __construct($db) {
		$this->conn = $db;
	}
	
	function create() {
		
        $query = "INSERT INTO ".$this->table_NAME. " (`number`) VALUES (:number)";		
		
		$stmt = $this->conn->prepare($query);
		
		
		$this->number = htmlspecialchars(strip_tags($this->number));

		
		$stmt->bindParam(":number", $this->number);
		
		if ($stmt->execute()) {
			return true;
		}
		
		return false;
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
	
	function read() {
		
		$query = "SELECT `number` FROM ".$this->table_NAME;
		
		$stmt = $this->conn->prepare($query);
		
		$stmt->execute();
		
		return $stmt;
		
	}
	
	/*function update() {
		
        $query = "UPDATE ".$this->table_NAME. " SET `POSITION`=:POSITION, `NAME`=:NAME, `SURNAME`=:SURNAME, `MIDDLENAME`=:MIDDLENAME, `ROOMPhones`=:ROOMPhones, `SALARY``:=SALARY WHERE ID = :id";
		
		$stmt = $this->conn->prepare($query);
		
		$this->POSITION = htmlspecialchars(strip_tags($this->POSITION));
		$this->NAME = htmlspecialchars(strip_tags($this->NAME));
		$this->SURNAME = htmlspecialchars(strip_tags($this->SURNAME));
		//$this->BIRTHDAY = htmlspecialchars(strip_tags($this->BIRTHDAY));
		$this->MIDDLENAME = htmlspecialchars(strip_tags($this->MIDDLENAME));
		$this->ROOMPhones = htmlspecialchars(strip_tags($this->ROOMPhones));
		$this->SALARY = htmlspecialchars(strip_tags($this->SALARY));
		

		$stmt->bindParam(":POSITION", $this->POSITION);
		$stmt->bindParam(":NAME", $this->NAME);
		$stmt->bindParam(":SURNAME", $this->SURNAME);
		//$stmt->bindParam(":BIRTHDAY", $this->BIRTHDAY);
		$stmt->bindParam(":MIDDLENAME", $this->MIDDLENAME);
		$stmt->bindParam(":ROOMPhones", $this->ROOMPhones);
		$stmt->bindParam(":SALARY", $this->SALARY);
		$stmt->bindParam(':id', $this->id);
		
		
		if ($stmt->execute()) {
			return true;
		}
		
		return false;
	} */
}
?>