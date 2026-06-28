<?
require_once __DIR__ . '/../error-config.php';
$a = 10;
$test = fn($b) => $a * $b;
echo $test();