<?
$path = $_SERVER['DOCUMENT_ROOT'] . '/learn-php/error-config.php';
if (file_exists($path)) {
    require_once $path;
} else {
    echo 'error-config.php НЕ НАЙДЕН!' . "<br/>";
}

require_once 'db.php';
session_start();

if (
    isset($_POST['email'], $_POST['password'])
    && $_POST['email'] !== ''
    && $_POST['password'] !== ''
) {
    $email = trim($_POST['email']);
    $password = $_POST['password'];
} else {
    echo json_encode([
        'ok' => false,
        'message' => 'недостаточно данных'
    ]);
}

$sql =
    'SELECT id, owner, email, password
    FROM accounts
    WHERE email = :email';
$stmt = $pdo->prepare($sql);
$stmt->execute(['email' => $email]);
$account = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$account || !password_verify($password, $account['password'])) {
    echo json_encode([
        'ok' => false,
        'message' => 'Неверная почта или пароль'
    ]);
    return;
}

echo json_encode([
    'ok' => true,
    'message' => 'Вход выполнен'
]);

$_SESSION['id'] = $account['id'];
$_SESSION['owner'] = $account['owner'];