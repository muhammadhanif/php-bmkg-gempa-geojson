<?php

// impor dan load class BMKGGempaGeoJSON
require_once('BMKGGempaGeoJSON.php');

use BMKGGempaGeoJSON as BMKG;

$bmkg = new BMKG;

// cek apakah variable $_GET['gempa'] ada atau tidak 
if (isset($_GET['data'])) {
    $data = $_GET['data'];
} else {
    $data = null;
}

// presentasi data
$geojson = null;

switch ($data) {
    case "m-5-terkini":
        // Gempa M 5+ Terkini
        $geojson = $bmkg->getGempaM5Terkini();
        break;
    case "tsunami-terkini":
        // Gempa Berpotensi Tsunami Terkini
        $geojson = $bmkg->getGempaBerpotensiTsunamiTerkini();
        break;
    case "m-5":
        // 60 Gempabumi M 5.0+
        $geojson = $bmkg->getGempaM5();
        break;
    default:
        echo "developed by <a href='https://hanifmu.com'><strong>hanifmu.com</strong></a>";
}
print_r($geojson);
