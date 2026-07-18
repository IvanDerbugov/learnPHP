<?
require_once __DIR__ . '/../error-config.php';

$message = 0;
// if($message) echo 'body just if, $message: ' . "$message" . "<br/>"; //не прошло:  Warning: Undefined variable $message in /home/a1178155/domains/derbugov.ru/public_html/learn-php/variables/isset.php on line 5
if(($message ?? '') !== '') echo 'body just if, $message: ' . "$message" . "<br/>"; 

if(isset($message)) {
    echo 'body if with isset, $message: ' . $message . "<br/>";
} else {
    echo 'body else if with isset. the variable was not found'; 
}