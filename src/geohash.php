<?php
require __DIR__ . '/../vendor/autoload.php';
use Sk\Geohash\Geohash;

$g = new Geohash();

$positionText = file_get_contents('./src/position.json');
$positions = json_decode($positionText, true);

foreach ($positions as $position) {
    $geohash = $g->encode($position['lat'], $position['lng'], 10);
    echo "\"{$position['town']}{$position['koaza']}\",{$position['lat']},{$position['lng']},{$geohash}\n";
}
