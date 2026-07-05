<?php
require_once __DIR__ . '/../error-config.php';

function staticVariable ($num)
{
    static $result = 1;
    $result++;
    $num = $num;
    $result += $num;
    echo '--1: ' . "$result <br/>";
}

staticVariable(3); //5
staticVariable(3); //9

function variable ($num)
{
    $result = 1;
    $result++;
    $num = $num;
    $result += $num;
    echo '--1: ' . "$result <br/>";
}

variable(3); //5
variable(3); //5

$a ='привет, я тут' . "<br/>";
function aa() {
    global $a;
    echo "$a";
}
aa();

$b = 'и я тоже тут!' . "<br/>";
function bb() {
    $variableB = $GLOBALS["b"];
    echo "$variableB"  . "<br/>";
};
bb();

echo '$GLOBALS: '  . "<br/>";
var_dump($GLOBALS);
