<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");

include_once "../config/db.php";
include_once "../objects/doctors.php";

$database = new Database();
$db = $database->getConnection();


$doctors = new Doctors($db);

$data = json_decode(file_get_contents("php://input"));

//$doctors->id = $data->id;

$doctors->POSITION = $data->POSITION;
$doctors->NAME = $data->NAME;
$doctors->SURNAME = $data->SURNAME;
//$doctors->BIRTHDAY = $data->BIRTHDAY;
$doctors->MIDDLENAME = $data->MIDDLENAME;
$doctors->ROOMNUM = $data->ROOMNUM;
$doctors->SALARY = $data->SALARY;

if ($doctors->update()){
	
	http_response_code(200);
	
	echo json_encode(array("message" => "Заспиь была изменена"), JSON_UNESCAPED_UNICODE);
}
else {
	
	http_response_code(503);
	
	echo json_encode(array("message" => "Невозможно обновить запись"), JSON_UNESCAPED_UNICODE);
}

?>