<?
require_once __DIR__ . '/error-config.php';
$countries = ["Germany" => "Berlin", "France" => "Paris", "Spain" => "Madrid"];
// $countries["Germany"] = null; 
unset($countries["Germany"]);
print_r($countries);
echo "<br/>" . 'have-Germany? ' . json_encode(isset($countries["Germany"])) . "<br/>";
echo '-----------';
echo "<br/>" . 'Does such a key even exist? ' . var_export(array_key_exists("Germany", $countries), true);