<?
$path = $_SERVER['DOCUMENT_ROOT'] . '/learn-php/error-config.php';
if (file_exists($path)) {
    require_once $path;
} else {
    echo 'error-config.php НЕ НАЙДЕН!' . "<br/>";
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/learn-php/i-coin/service/db.php';
session_start();

if (isset($_POST['displayBalance']) && $_POST['displayBalance'] !== '') {
    $displayBalance = $_POST['displayBalance'];
    if ($displayBalance === '1' || $displayBalance === '0') {
        $sql =
            'UPDATE accounts
            SET displayBalance = :displayBalance
            WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['displayBalance' => $displayBalance, 'id' => $_SESSION['id']]);
        echo json_encode(['ok' => true]);
    } else  {
        echo json_encode(['ok' => false]);
    }
} else  {
    echo json_encode(['ok' => false]);
}