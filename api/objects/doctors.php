<?php
class Doctors{
	
	private  $conn;
	private  $table_NAME = "Doctors";
	
	public $id;
	public $POSITION;
	public $NAME;
	public $SURNAME;
	//public $BIRTHDAY;
	public $MIDDLENAME;
	public $ROOMNUM;
	public $SALARY;
	
	public function __construct($db) {
		$this->conn = $db;
	}
	
	function create() {
		
        $query = "INSERT INTO ".$this->table_NAME. " (`POSITION`, `NAME`, `SURNAME`, `MIDDLENAME`, `ROOMNUM`, `SALARY`) VALUES (:POSITION, :NAME, :SURNAME, :MIDDLENAME, :ROOMNUM, :SALARY)";		
		
		$stmt = $this->conn->prepare($query);
		
		//$this->id = htmlspecialchars(strip_tags($this->id));
		$this->POSITION = htmlspecialchars(strip_tags($this->POSITION));
		$this->NAME = htmlspecialchars(strip_tags($this->NAME));
		$this->SURNAME = htmlspecialchars(strip_tags($this->SURNAME));
		//$this->BIRTHDAY = htmlspecialchars(strip_tags($this->BIRTHDAY));
		$this->MIDDLENAME = htmlspecialchars(strip_tags($this->MIDDLENAME));
		$this->ROOMNUM = htmlspecialchars(strip_tags($this->ROOMNUM));
		$this->SALARY = htmlspecialchars(strip_tags($this->SALARY));
		

		//$stmt->bindParam(":id", $this->id);
		$stmt->bindParam(":POSITION", $this->POSITION);
		$stmt->bindParam(":NAME", $this->NAME);
		$stmt->bindParam(":SURNAME", $this->SURNAME);
		//$stmt->bindParam(":BIRTHDAY", $this->BIRTHDAY);
		$stmt->bindParam(":MIDDLENAME", $this->MIDDLENAME);
		$stmt->bindParam(":ROOMNUM", $this->ROOMNUM);
		$stmt->bindParam(":SALARY", $this->SALARY);
		
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
		
		$query = "SELECT `POSITION`, `NAME`, `SURNAME`, `MIDDLENAME`, `ROOMNUM`, `SALARY` FROM ".$this->table_NAME;
		
		$stmt = $this->conn->prepare($query);
		
		$stmt->execute();
		
		return $stmt;
	}
	
	function update() {
		
        $query = "UPDATE ".$this->table_NAME. " SET `POSITION`=:POSITION, `NAME`=:NAME, `SURNAME`=:SURNAME, `MIDDLENAME`=:MIDDLENAME, `ROOMNUM`=:ROOMNUM, `SALARY``:=SALARY WHERE ID = :id";
		
		$stmt = $this->conn->prepare($query);
		
		$this->POSITION = htmlspecialchars(strip_tags($this->POSITION));
		$this->NAME = htmlspecialchars(strip_tags($this->NAME));
		$this->SURNAME = htmlspecialchars(strip_tags($this->SURNAME));
		//$this->BIRTHDAY = htmlspecialchars(strip_tags($this->BIRTHDAY));
		$this->MIDDLENAME = htmlspecialchars(strip_tags($this->MIDDLENAME));
		$this->ROOMNUM = htmlspecialchars(strip_tags($this->ROOMNUM));
		$this->SALARY = htmlspecialchars(strip_tags($this->SALARY));
		

		$stmt->bindParam(":POSITION", $this->POSITION);
		$stmt->bindParam(":NAME", $this->NAME);
		$stmt->bindParam(":SURNAME", $this->SURNAME);
		//$stmt->bindParam(":BIRTHDAY", $this->BIRTHDAY);
		$stmt->bindParam(":MIDDLENAME", $this->MIDDLENAME);
		$stmt->bindParam(":ROOMNUM", $this->ROOMNUM);
		$stmt->bindParam(":SALARY", $this->SALARY);
		$stmt->bindParam(':id', $this->id);
		
		
		if ($stmt->execute()) {
			return true;
		}
		
		return false;
	} 
}
?>