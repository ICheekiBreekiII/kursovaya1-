<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset-UTF-8");

include_once "../config/db.php";
include_once "../objects/num.php";

$database = new Database();

$db = $database->getConnection();

$phones = new Phones($db);

$stmt = $phones->read();
$num = $stmt->rowCount();

if ($num > 0) {
	$Phones_arr = array();
	$Phones_arr['records'] = array();
	
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		extract($row);
		$phones_item = array(
			"number" => $number,
		);
		
		array_push($Phones_arr['records'], $phones_item);
	}
	
	http_response_code(200);
	
	echo json_encode($Phones_arr);
}
else {
	http_response_code(404);
	
	echo json_encode(array("message" => "Записи не найдены"), JSON_UNESCAPED_UNICODE);
}


?>