<?php 

include  './soundtrack.php';
$seeder = new seeder();
$infos = $seeder->run();
header('Content-Type: application/json');
//echo $infos;

if(isset($_GET["id"]) && $_GET["id"] != NULL){
    echo json_encode($infos[$_GET["id"]]);
}else{
    echo json_encode($infos);
}