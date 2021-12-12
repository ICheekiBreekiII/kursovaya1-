<?php
		header("Access-Control-Allow-Origin: *");
		header("Content-Type: application/json; charset-UTF-8");
			
			include_once "../config/db.php";
			include_once "qa.php";

			$database = new Database();

			$db = $database->getConnection();

			$qa = new Qa($db);

			$stmt =$qa->read();
			$num = $stmt->rowCount();

			if ($num > 0) {
				$Qa_arr = array();
				$Qa_arr['records'] = array();
				
				while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
					extract($row);
					$qa_item = array(
						"QA" => $QA,
					);
					
					array_push($Qa_arr['records'], $qa_item);
				}
				
				http_response_code(200);
				
				//echo json_encode($news_arr);
				$json_data = json_encode($Qa_arr);
				file_put_contents('qa.json', $json_data);
			}
			else {
				http_response_code(404);
				
				echo json_encode(array("message" => "Записи не найдены"), JSON_UNESCAPED_UNICODE);
			}
?>