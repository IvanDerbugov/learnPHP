<?
const a = '1';
define('NUMBER', 22);
echo 'a: ' . a . ' NUMBER: ' . NUMBER;

echo "<br/>" . __LINE__ . ' строка в файле ' . __FILE__ ;

echo "<br/>" . '__DIR__: ' . __DIR__ . "<br/>";
echo "<br/>" . '__DIR__: ' . __DIR__ . "<br/>";

function nameFunction() {
    echo "<br/>" . '__FUNCTION__: ' . __FUNCTION__ . "<br/>";
}
nameFunction();