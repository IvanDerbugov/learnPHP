<?
function getUsers (PDO $pdo) {
    $path = $_SERVER['DOCUMENT_ROOT'] . '/learn-php/error-config.php';
    if (file_exists($path)) {
        require_once $path;
    } else {
        echo 'error-config.php НЕ НАЙДЕН!' . "<br/>";
    }
    $sql = 'SELECT id, owner, money, displayBalance
        FROM accounts
        ORDER BY (id = :id) DESC, id';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => (int) $_SESSION['id']]);
    return $users = $stmt->fetchAll();
}
?>