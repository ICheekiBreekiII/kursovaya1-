<?php
class Hospital{
	private  $conn;
	private  $table_name = "Doctors";
	
	public $ID;
	public $NAME;
	public $SURNAME;
	public $BIRTHDAY;
	public $SALARY;
	
	public function __construct($db) {
		$this->conn = $db;
	}
	
	function read() {
		
		$query = "SELECT `ID`,`NAME`,`SURNAME`,`BIRTHDAY`,`SALARY` FROM ".$this->table_name;
		
		$stmt = $this->conn->prepare($query);
		
		$stmt->execute();
		
		return $stmt;
	}
}
?>