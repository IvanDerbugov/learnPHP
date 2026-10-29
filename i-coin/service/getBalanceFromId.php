<?
function getBalance(PDO $pdo, int $id)
{
    $sql =
        'SELECT money 
        FROM accounts 
        WHERE id = :id';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    return $stmt->fetchColumn(); //получили одну колонку money, первую и её же единственную и выводим
}
?>