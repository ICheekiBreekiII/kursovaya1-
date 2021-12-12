	<?php

	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	header("Access-Control-Allow-Methods: PUT");

	include_once "db2.php";
	include_once "news.php";

	$database = new Database();
	$db = $database->getConnection();


	$news = new News($db);

	$data = json_decode(file_get_contents("php://input"));

	//$news->id = $data->id;

	$news->NEWS = $data->NEWS;

	if ($news->update()){
		
		http_response_code(200);
		
		echo json_encode(array("message" => "Заспиь была изменена"), JSON_UNESCAPED_UNICODE);
	}
	else {
		
		http_response_code(503);
		
		echo json_encode(array("message" => "Невозможно обновить запись"), JSON_UNESCAPED_UNICODE);
	}

	?>
	