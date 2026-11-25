<?
$path = $_SERVER['DOCUMENT_ROOT'] . '/learn-php/error-config.php';
if (file_exists($path)) {
    require_once $path;
} else {
    echo 'error-config.php НЕ НАЙДЕН!' . "<br/>";
}
session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/learn-php/i-coin/service/db.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/learn-php/i-coin/service/methodsMoney/getBalanceFromId.php';
if (isset($_SESSION['id'])) {
    $money = getBalance($pdo, (int) $_SESSION['id']);
}

if (
    isset($_POST['recipientTransferId'], $_POST['sumTransfer'])
    && $_POST['recipientTransferId'] !== ''
    && $_POST['sumTransfer'] !== ''
) {
    $recipientTransferId = filter_var(
        strip_tags($_POST['recipientTransferId']),
        FILTER_VALIDATE_INT
    );
    $sumTransfer = filter_var(
        strip_tags($_POST['sumTransfer']),
        FILTER_VALIDATE_INT
    );
}
if (
    $sumTransfer === false || $sumTransfer <= 0
    || $recipientTransferId === false
) {
    echo json_encode(['ok' => 'false', 'message' => 'сумма отправки - херь']);
    exit;
}
;
if ($money >= $sumTransfer) {
    try {
        $pdo->beginTransaction();
        $sql = 'UPDATE accounts
                SET money = money - :sumTransfer
                WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['sumTransfer' => $sumTransfer, 'id' => $_SESSION['id']]);

        $sql = 'UPDATE accounts
                SET money = money + :sumTransfer
                WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['sumTransfer' => $sumTransfer, 'id' => $recipientTransferId]);
        $pdo->commit();
        echo json_encode(['ok' => true]);
    } catch (PDOException $error) {
        $pdo->rollBack();
        echo json_encode(['ok' => false, 'message' => $error], JSON_UNESCAPED_UNICODE);
    }
} else {
    echo json_encode(['ok' => false]);
}
?>