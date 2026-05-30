<?
$newArr = [1, 5, 'mum'];
echo '$newArr: ' . print_r($newArr, true) . '<br>';
$newArr[] = 10;
echo '$newArr: '; print_r ($newArr); echo '<br>';


$arr2 = [1=>1, 2=>5, 4=>'mum'];
echo '$arr2: ' . print_r($arr2, true) . '<br>';
echo '$arr2[0]' . print_r($arr[0], true) . '<br>';
echo '$arr2[1]' . print_r($arr[1], true);