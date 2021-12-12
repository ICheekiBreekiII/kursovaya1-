	<?php

	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	header("Access-Control-Allow-Methods: POST");

	include_once "db2.php";
	include_once "news.php";

	$database = new Database();
	$db = $database->getConnection();


	$news = new News($db);

	$data = json_decode(file_get_contents("php://input"));

	if (!empty($data->NEWS)) {
		$news->NEWS = $data->NEWS;

		
		if ($news->create()) {
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
