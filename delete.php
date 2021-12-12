	<?php

	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	header("Access-Control-Allow-Methods: DELETE");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

	include_once "db2.php";
	include_once "news.php";

	$database = new Database();
	$db = $database->getConnection();

	$news = new News($db);

	$data = json_decode(file_get_contents("php://input"));

	$news->id = $data->id;

	if ($news->delete()){
		
		http_response_code(200);
		
		echo json_encode(array("message" => "Запись была удалёна."), JSON_UNESCAPED_UNICODE);
	}
	else {
		
		http_response_code(503);
		
		echo json_encode(array("message" => "Не удалось удалить запись"), JSON_UNESCAPED_UNICODE);
	}

	?>
	