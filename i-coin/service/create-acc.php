<?
$path = $_SERVER['DOCUMENT_ROOT'] . '/learn-php/error-config.php';
if (file_exists($path)) {
    require_once $path;
} else
    echo 'error-config.php НЕ НАЙДЕН!' . "<br/>";

require_once 'Accounts.php';
require_once 'db.php';

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
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    //TODO: сделать защиту от sql-иъекций
    $passwordHash = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $typeAcc = $_POST['type'];

    if ($typeAcc === 'savings') {
        $isUsual = 0;
    } else if ($typeAcc === 'usual') {
        $isUsual = 1;
    } else {
        echo json_encode([
            'ok' => false,
            'message' => 'неизвестный тип аккаунта'
        ]);
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