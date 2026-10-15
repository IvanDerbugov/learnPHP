<?
$path = $_SERVER['DOCUMENT_ROOT'] . '/learn-php/error-config.php';
if (file_exists($path)) {
    require_once $path;
} else
    echo 'error-config.php НЕ НАЙДЕН!' . "<br/>";

require_once 'Accounts.php';

if (
    isset($_POST['name']) 
    && isset($_POST['email']) 
    && isset($_POST['password']) 
    && isset($_POST['type'])
    && $_POST['name'] !== ''
    && $_POST['email'] !== ''
    && $_POST['password'] !== ''
    && $_POST['type'] !== ''
) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $typeAcc = $_POST['type'];

    if ($typeAcc === 'savings') {
        $userId_1 = new SavingsAccount($name, $email, $password);
    } else if ($typeAcc === 'usual') {
        $userId_1 = new Account($name, $email, $password);
    }

    echo json_encode([
        'ok' => true,
        'name' => $name,
        'email' => $email,
        'type' => $typeAcc,
        'message' => $userId_1->Welcome(),
    ], JSON_UNESCAPED_UNICODE);
} else {
    echo json_encode([
        'ok' => false,
        'message' => 'недостаточно данных'
    ]);
}