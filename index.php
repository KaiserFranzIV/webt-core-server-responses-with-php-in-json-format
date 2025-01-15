<?php 

include  './soundtrack.php';
$seeder = new seeder();
$infos = $seeder->run();
header('Content-Type: application/json');
// //echo $infos;

if (isset($_GET["id"]) && $_GET["id"] != NULL) {
    echo json_encode($infos[$_GET["id"]]);
} elseif (isset($_GET["name"]) && $_GET["name"] != NULL) {
    $foundOst = null;
    foreach ($infos as $ost) {
        if ($ost->name === $_GET["name"]) {
            $foundOst = $ost;
            break;
        }
    }
    echo json_encode($foundOst);
} else {
    echo json_encode($infos);
}
