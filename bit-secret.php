<?php
require_once __DIR__ . '/error-config.php';

echo "<pre>";
$key = "1235555555555555555";
$secret = "Pok7772701." ^ $key;
echo $secret . "<br>";
echo ($secret ^ $key) . "<br>";
echo "</pre>";