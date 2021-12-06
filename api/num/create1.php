<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");

include_once "../config/db.php";
include_once "../objects/num.php";

$database = new Database();
$db = $database->getConnection();


$phones = new Phones($db);

$data = json_decode(file_get_contents("php://input"));

if (!empty($data->number)) {
	$phones->number = $data->number;
	
	if ($phones->create()) {
		http_response_code(201);
		
		echo json_encode(array("message" => "Запись была создана"), JSON_UNESCAPED_UNICODE);
	}
	else {
		http_response_code(503);
		
		echo json_encode(array("message" => "Невозможно создать запись"), JSON_UNESCAPED_UNICODE);
	}
}
else {
	http_response_code(400);
	
	echo json_encode(array("message" => "Невозможно создать запись. Данные неполные"), JSON_UNESCAPED_UNICODE);
}

?>
