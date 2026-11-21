<?
$path = $_SERVER['DOCUMENT_ROOT'] . '/learn-php/error-config.php';
if (file_exists($path)) {
    require_once $path;
} else {
    echo 'error-config.php НЕ НАЙДЕН!' . "<br/>";
}
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/learn-php/i-coin/service/db.php';

if (isset($_POST['name']) && $_POST['name'] !== '') {
    $delegateId = strip_tags($_POST['name']);
    try {
        $sql = 'SELECT delegate_id
                FROM delegate
                WHERE owner_id = :owner_id AND delegate_id = :delegate_id';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['owner_id' => $_SESSION['id'], 'delegate_id' => $delegateId]);
        $addWrite = (bool) $stmt->fetch();

        if (!$addWrite) {
            $sql = 'INSERT INTO delegate (owner_id, delegate_id)
            VALUES (:owner_id, :delegate_id)';
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['owner_id' => $_SESSION['id'], 'delegate_id' => $delegateId]);
            echo json_encode(['ok' => true]);
        } else if ($addWrite) {
            $sql = 'DELETE FROM delegate
            WHERE owner_id = :owner_id AND delegate_id = :delegate_id';
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['owner_id' => $_SESSION['id'], 'delegate_id' => $delegateId]);
            echo json_encode(['ok' => true]);
        }
    } catch (PDOException $error) {
        echo json_encode(['ok' => false]);
    }
} else {
    echo json_encode(['ok' => false]);
}