<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset-UTF-8");

include_once "../config/db.php";
include_once "../objects/doctors.php";

$database = new Database();

$db = $database->getConnection();

$doctors = new Doctors($db);

$stmt =$doctors->read();
$num = $stmt->rowCount();

if ($num > 0) {
	$Doctors_arr = array();
	$Doctors_arr['records'] = array();
	
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		extract($row);
		$doctors_item = array(
			"POSITION" => $POSITION,
			"NAME" => $NAME,
			"SURNAME" => $SURNAME,
			"MIDDLENAME" => $MIDDLENAME,
			"ROOMNUM" => $ROOMNUM,
			"SALARY" => $SALARY,
		);
		
		array_push($Doctors_arr['records'], $doctors_item);
	}
	
	http_response_code(200);
	
	//echo json_encode($Doctors_arr);
	$json_data = json_encode($Doctors_arr);
	file_put_contents('doctors.json', $json_data);
}
else {
	http_response_code(404);
	
	echo json_encode(array("message" => "Записи не найдены"), JSON_UNESCAPED_UNICODE);
}


{
   header ('Location: test.html');  
   exit();    
}

?>




