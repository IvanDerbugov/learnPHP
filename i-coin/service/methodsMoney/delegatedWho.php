<?
function delegatedWho (PDO $pdo) {
    $path = $_SERVER['DOCUMENT_ROOT'] . '/learn-php/error-config.php';
    if (file_exists($path)) {
        require_once $path;
    } else {
        echo 'error-config.php НЕ НАЙДЕН!' . "<br/>";
    }

    $sql = 'SELECT owner_id, owner
            FROM delegate
            JOIN accounts ON accounts.id = delegate.owner_id
            WHERE delegate_id = :id';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => (int) $_SESSION['id']]);
    return $haveAccessTo = $stmt->fetchAll(PDO::FETCH_ASSOC);
}