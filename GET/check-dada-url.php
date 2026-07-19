<?
require_once __DIR__ . '/../error-config.php';
$brand = ' not defanet ';
$model = ' not defanet ';
if(isset($_GET['brand'])) { 
    $brand = $_GET['brand'];
} else {
    echo 'show all brands'  . "<br/>";
}

if(isset($_GET['model'])) {
    $model = $_GET['model'];
} else {
    echo 'show all models'  . "<br/>";
};

echo 'You\'re choose' . "\"" . $brand . "\"" . '-' . "\"" . $model . "\"";