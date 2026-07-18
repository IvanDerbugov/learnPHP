<?
$a = [1, 2];
$b = &$a;

echo '$a = ' . print_r($a , true) . "<br/>";
echo '$a = ' . print_r($a , true) . "<br/>";
echo '---------' . "<br/>";
rsort($b);
array_push($a, 10);
$a[] = 'x';
echo '$a = ' . print_r($a , true) . "<br/>";
echo '$a = ' . print_r($a , true) . "<br/>";