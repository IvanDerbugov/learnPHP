<?
function delegatedWho (PDO $pdo) {
    $path = $_SERVER['DOCUMENT_ROOT'] . '/learn-php/error-config.php';
    if (file_exists($path)) {
        require_once $path;
    } else {
        echo 'error-config.php НЕ НАЙДЕН!' . "<br/>";
    }

    $sql = 'SELECT owner_id
            FROM delegate
            WHERE delegate_id = :id';
            // TODO нужно получать ещё имя кто доступ дал
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => (int) $_SESSION['id']]);
    return $haveAccessTo = $stmt->fetchAll(PDO::FETCH_COLUMN);
}