<?
require_once __DIR__ . '/error-config.php';

$arr = [0=> 'нуль', 1=>['name' => 'Ivan'], 3=>[0,1,2,3], 10=>'ten'];
foreach($arr as $element) {
    echo "$element <br/>";
};
echo '----------' . "<br/>";

foreach ($arr as $key => $value) {
    $display = is_array($value) ? json_encode($value, JSON_UNESCAPED_UNICODE) : $value;
    echo "$key - $display<br/>";
}