<?
function displayBalance (PDO $pdo, int $id) {
    $sql =
            'SELECT displayBalance
            FROM accounts
            WHERE id = :id';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    return $stmt->fetchColumn();
}