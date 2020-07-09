<?php

use app\CalcController;

$calculadora = new CalcController();

//$temp = new CalcController();

$contents = file_get_contents('db.json');
$json = json_decode($contents, true);

$method = $_SERVER['REQUEST_METHOD'];

header('Content-Type: application/json; charset=utf-8');

$body = file_get_contents('php://input');

if($method === 'GET'){
	echo json_encode($json);
}else{
	echo '[]';
}

$now = new DateTime('now');
//echo strtotime($now->format('Y-m-d'));
$day = date('w', strtotime($now->format('Y-m-d')));
echo $day;

