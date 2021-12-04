<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");

include_once "../config/db.php";
include_once "../objects/doctors.php";

$database = new Database();
$db = $database->getConnection();


$doctors = new Doctors($db);

$data = json_decode(file_get_contents("php://input"));

if (!empty($data->POSITION) && !empty($data->NAME) && !empty($data->SURNAME) && !empty($data->SALARY) && !empty($data->MIDDLENAME) && !empty($data->ROOMNUM)) {
	$doctors->POSITION = $data->POSITION;
	$doctors->NAME = $data->NAME;
	$doctors->SURNAME = $data->SURNAME;
	//$doctors->BIRTHDAY = $data->BIRTHDAY;
	$doctors->MIDDLENAME = $data->MIDDLENAME;
	$doctors->ROOMNUM = $data->ROOMNUM;
	$doctors->SALARY = $data->SALARY;
	
	if ($doctors->create()) {
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
