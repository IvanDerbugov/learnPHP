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
require_once $_SERVER['DOCUMENT_ROOT'] . '/learn-php/i-coin/service/methodsMoney/delegatedWho.php';

if (isset($_SESSION['id'])) {
    $money = getBalance($pdo, (int) $_SESSION['id']);
} else {
    echo json_encode(['ok' => 'false', 'message' => 'сессия пуста'], JSON_UNESCAPED_UNICODE);
    exit;
}

if (
    isset($_POST['getMoneyFrom'], $_POST['sumTransfer'])
    && $_POST['getMoneyFrom'] !== ''
    && $_POST['sumTransfer'] !== ''
) {
    $getMoneyFrom = filter_var(
        strip_tags($_POST['getMoneyFrom']),
        FILTER_VALIDATE_INT
    );
    $sumTransfer = filter_var(
        strip_tags($_POST['sumTransfer']),
        FILTER_VALIDATE_INT
    );
} else {
    echo json_encode(['ok' => 'false', 'message' => 'херь'], JSON_UNESCAPED_UNICODE);
    exit;
}

if (
    $sumTransfer === false || $sumTransfer <= 0
    || $getMoneyFrom === false
) {
    echo json_encode(['ok' => 'false', 'message' => 'сумма отправки - херь'], JSON_UNESCAPED_UNICODE);
    exit;
}

//можно было сложить из имеющихся методов, но много лишнего тащили бы тогда и обрабатывали.
$sql = 'SELECT EXISTS (
        SELECT 1
        FROM delegate
        WHERE owner_id = :owner_id
        AND delegate_id = :delegate_id)';
$stmt = $pdo->prepare($sql);
$stmt->execute(['owner_id' => $getMoneyFrom, 'delegate_id' => $_SESSION['id']]);
$correctId = (int) $stmt->fetchColumn();
if (!$correctId) {
    echo json_encode(['ok' => 'false', 'message' => 'нету прав, не пытайся'], JSON_UNESCAPED_UNICODE);
    exit;
}

$balanceAcountDelegate = getBalance($pdo, (int) $getMoneyFrom);
if ($balanceAcountDelegate >= $sumTransfer) {
    try {
        $pdo->beginTransaction();
        $sql = 'UPDATE accounts
                SET money = money - :sumTransfer
                WHERE id = :idDelegateAccount';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['sumTransfer' => $sumTransfer, 'idDelegateAccount' => $getMoneyFrom]);

        $sql = 'UPDATE accounts
                SET money = money + :sumTransfer
                WHERE id = :idRecipient';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['sumTransfer' => $sumTransfer, 'idRecipient' => $_SESSION['id']]);
        $pdo->commit();
        echo json_encode(['ok' => true]);
    } catch (PDOException $error) {
        $pdo->rollBack();
        echo json_encode(['ok' => false, 'message' => $error], JSON_UNESCAPED_UNICODE);
    }
} else {
    echo json_encode(['ok' => false, 'message' => 'недостаточно денег у дел. акка'], JSON_UNESCAPED_UNICODE);
}