<?php

// impor dan load class BMKGGempaGeoJSON
require_once('BMKGGempaGeoJSON.php');

use BMKGGempaGeoJSON as BMKG;

$bmkg = new BMKG;

// cek apakah variable $_GET['gempa'] ada atau tidak 
if (isset($_GET['gempa'])) {
    $gempa = $_GET['gempa'];
} else {
    $gempa = null;
}

// presentasi data
$geojson = null;

switch ($gempa) {
    case "m-5-terkini":
        $geojson = $bmkg->getGempaM5Terkini();
        break;
    case "tsunami-terkini":
        $geojson = $bmkg->getGempaBerpotensiTsunamiTerkini();
        break;
    default:
        echo "Konversi data gempa BMKG dari XML ke GeoJSON.";
}

print_r($geojson);
