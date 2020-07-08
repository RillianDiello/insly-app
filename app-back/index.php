<?php

$path = explode('/', $_GET['path']);
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

/*$diasemana = array('Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabado');

$data = date('Y-m-d');

$agora = new DateTime();

$agora = $agora->format('Y-m-d');

echo $data;


$diasemana_numero = date('w', strtotime($agora));

echo $diasemana[$diasemana_numero];

$start = new DateTime('08:25:00');
$end = new DateTime('12:25:00');

$now = new DateTime('now');
//echo $now->format('Y-m-d h:i:s');
if ( $start <= $now && $now <= $end ) {
    echo 'Está entre o intervalo';
}else{
	echo 'Não esta no intervalo';
}

function checkInterval($dateInterval, $startDate, $endDate) {
   $dateInterval = new DateTime($dateInterval);
   $startDate = new DateTime($startDate);
   $endDate = new DateTime($endDate);

   $startDate->format('Y-m-d H:i:s.uO'); 
   $endDate->format('Y-m-d H:i:s.uO'); 

  return ($dateInterval->getTimestamp() >= $startDate->getTimestamp() &&
          $dateInterval->getTimestamp() <= $endDate->getTimestamp());

} 
//usando a verificação...
if (checkInterval(date('Y-m-d H:i:s'), date('Y-m-d').' 15:00:00', date('Y-m-d').' 20:00:00')) {
   echo "Está no intervalo!";
  }
  else{
  	echo "não esta no intervalo";
  } 

 // Pega o momento atual
//echo $agora->format('d/m/Y H:i'); // Exibe no formato desejadorset=utf-8');


//$valueOfCar = filter_input(INPUT_POST, "valueOfCar", FILTER_SANITIZE_NUMBER_FLOAT);
//$taxPercent = filter_input(INPUT_POST, "taxPercent", FILTER_SANITIZE_NUMBER_FLOAT);
//$numInstalments = filter_input(INPUT_POST, "numInstalments", FILTER_SANITIZE_NUMBER_FLOAT);


// $path = explode('/', $_GET['path']);

/*$json = json_decode($content);
echo json_encode($json);*/

// $method = $_SERVER['REQUUEST_METHOD'];

// header('Content-Type: application/json; charset=utf-8');

// $body = file_get_contents('php://input');

// if($method === 'GET'){
//     if($json[$path[0]]){
//         echo json_encode($json[0]);
//     }else{
//         echo '[]';
//     }
// }
