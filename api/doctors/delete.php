<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once "../config/db.php";
include_once "../objects/doctors.php";

$database = new Database();
$db = $database->getConnection();

$doctors = new Doctors($db);

$data = json_decode(file_get_contents("php://input"));

$doctors->id = $data->id;

if ($doctors->delete()){
	
	http_response_code(200);
	
	echo json_encode(array("message" => "Запись была удалёна."), JSON_UNESCAPED_UNICODE);
}
else {
	
	http_response_code(503);
	
	echo json_encode(array("message" => "Не удалось удалить запись"), JSON_UNESCAPED_UNICODE);
}

?>