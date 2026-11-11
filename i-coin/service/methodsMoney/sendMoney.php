<?
$path = $_SERVER['DOCUMENT_ROOT'] . '/learn-php/error-config.php';
if (file_exists($path)) {
    require_once $path;
} else {
    echo 'error-config.php НЕ НАЙДЕН!' . "<br/>";
}

if (
    isset($_POST['recipientTransferId'], $_POST['sumTransfer'])
    && $_POST['recipientTransferId'] !== ''
    && $_POST['sumTransfer'] !== ''
) {
    $recipientTransferId = strip_tags($_POST['recipientTransferId']);
    $sumTransfer = strip_tags($_POST['sumTransfer']);
}
if ($money >= $sumTransfer) {
    // $sql = 'UPDATE money
    //         FROM accounts
    //         WHERE id = :id';
    // $stmt = $pdo->prepare($sql);
    // $stmt->execute(['id' => $recipientTransferId]);
    // $moneyRecipient = $stmt->fetchAll();
} else echo json_encode(['ok' => false]);
?>