<? 
require_once __DIR__ . '/error-config.php';
print_r([0 => 'нуль', 2=>'2', 5=>[0,10]]);
echo "<br/>" . '-----' ."<br/>";

$a = [0,1];
$b = [0,2];
echo 'Массив: ' . var_export($a) . "<br/>";
echo 'Массив: ' . var_export($a, true);
echo "<br/>" . '-----' ."<br/>";

var_export([1,10]);
echo "<br/>";
var_export([1,11], true); //не выведит, вот для таких случаев false