<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset-UTF-8");

include_once "../config/db.php";
include_once "../objects/doctors.php";

$database = new Database();

$db = $database->getConnection();

$hospital = new Hospital($db);

$stmt =$hospital->read();
$num = $stmt->rowCount();

if ($num > 0) {
	$Doctors_arr = array();
	$Doctors_arr['records'] = array();
	
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		extract($row);
		$hospital_item = array(
			"ID" => $ID,
			"NAME" => $NAME,
			"SURNAME" => $SURNAME,
			"BIRTHDAY" => $BIRTHDAY,
			"SALARY" => $SALARY,
		);
		
		array_push($Doctors_arr['records'], $hospital_item);
	}
	
	http_response_code(200);
	
	echo json_encode($Doctors_arr);
}
else {
	http_response_code(404);
	
	echo json_encode(array("message" => "Записи не найдены"), JSON_UNESCAPED_UNICODE);
}

?>