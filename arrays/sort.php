<?
$arr = ['A' => 'а', 'C' => 'с', 'B' => 'б', 1 => 10];
asort($arr);
echo '$arr after asort: ' . print_r($arr, true)  . "<br/>" . '========='  . "<br/>";

$os = array("Windows 7", "Windows 8", "Windows 10");
natsort($os);
echo '$os after natsort: ' . print_r($os, true)  . "<br/>";