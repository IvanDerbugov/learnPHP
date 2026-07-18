<?
require_once __DIR__ . '/../error-config.php';
require_once __DIR__ . '/group-variables.php';
$getPrice = $dataPhone['priceInDollars'];
echo 'Выбранная вами модель стоит ' . "$getPrice" . '$';