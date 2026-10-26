<?
session_start();
$_SESSION = [];
session_destroy();
header('Location: /learn-php/i-coin');