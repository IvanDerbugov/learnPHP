<?
require_once __DIR__ . '/../error-config.php';
$a = 99;
$test = function () use ($a) {
    echo $a;
};
$test();

echo "<br/>";
$b = 66;
$test2 = function () {
    global $b;
    echo $b;
};
$test2();