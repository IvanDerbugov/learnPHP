<?
require_once __DIR__ . '/../error-config.php';

$model = 'Samsung 25S Ultra';
$brend = 'Samsung';
$yearExit = 2025;
$yearProduce = 2026; 
$priceInDollars = 1000;

$dataPhone = compact("model", "brend", "yearExit", "yearProduce", "priceInDollars");
// echo 'data phone: ' . print_r($dataPhone, true);
