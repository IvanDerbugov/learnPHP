<?
require_once __DIR__ . '/error-config.php';

$arr = [0=> 'нуль', 1=>['name' => 'Ivan'], 3=>[0,1,2,3], 10=>'ten'];

$arr[2] = 'два';
$arr[] = 'lastEl';

echo '----------' . "<br/>";
foreach ($arr as $key => $value) {
    $display = is_array($value) ? json_encode($value, JSON_UNESCAPED_UNICODE) : $value;
    echo "$key - $display<br/>";
}

ksort($arr); //сортирну массив по ключам, мутабельный
// $arrSort = krsort($arr); //вернёт 1 как просто успех

// echo "<br/>" . '----------' . "<br/>" . 
// '$arr after ksort() - foreach' . "<br/>" . 
// '----------' . "<br/>";
// foreach ($arr as $key => $value) {
//     $display = is_array($value) ? json_encode($value, JSON_UNESCAPED_UNICODE) : $value;
//     echo "$key - $display<br/>";
// }

// echo '----------' . "<br/>" . 
// '$arr after ksort() - for' . "<br/>" . 
// '----------' . "<br/>";
// for ($i = 0; $i < count($arr); $i++) {
//     json_encode("$arr[$i]" . "<br/>");
// };

// $test = 0;
// echo "<br/>" . '$test = ' . "$test"; 

// $test = 1;
// echo "<br/>" . '$test = ' . "$test"; 