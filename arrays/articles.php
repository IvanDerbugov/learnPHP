<?
require_once __DIR__ . '/../error-config.php';
const articles = ['How chose sofa?', 'The best for furniture begore 500$', 'Useful chairs'];
$feed = articles;
shuffle($feed);
echo 'cont articles in the end code: ' . print_r(articles, true) . "<br>";
echo '$feed in the end code: ' . print_r($feed, true);