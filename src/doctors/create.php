<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF=8");
header("Access-Control-Allow-Methods: *");

include_once "../config/db.php";
include_once "../config/doctors.php";

$database = new Database();
$db = $database->getConnection();

