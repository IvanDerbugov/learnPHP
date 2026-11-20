<?
function delegatedWhom (PDO $pdo) {
    $path = $_SERVER['DOCUMENT_ROOT'] . '/learn-php/error-config.php';
    if (file_exists($path)) {
        require_once $path;
    } else {
        echo 'error-config.php НЕ НАЙДЕН!' . "<br/>";
    }

    $sql = 'SELECT delegate_id
            FROM delegate
            WHERE owner_id = :id';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => (int) $_SESSION['id']]);
    return $usersDelegate = $stmt->fetchAll(PDO::FETCH_COLUMN);
}