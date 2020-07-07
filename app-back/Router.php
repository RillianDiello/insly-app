<?php



$path = explode('/', $_GET['path']);
$content = file_get_contents('db.json');

$json = json_decode($content,true);

$method = $_SERVER['REQUUEST_METHOD'];

header('Content-Type: application/json; charset=utf-8');

$body = file_get_contents('php://input');

if($method === 'GET'){
    if($json[$path[0]]){
        echo json_encode($json[0]);
    }else{
        echo '[]';
    }
}
