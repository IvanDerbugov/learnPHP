<?
$path = $_SERVER['DOCUMENT_ROOT'] . '/learn-php/error-config.php';
if (file_exists($path)) {
    require_once $path;
} else echo 'error-config.php НЕ НАЙДЕН!' . "<br/>";

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    echo $name . "<br/>";
    echo $email . "<br/>";
    echo $password . "<br/>";
} else {
    echo 'error';
}