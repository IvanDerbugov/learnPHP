<?
function sendMoney (PDO $pdo, $idRecipient) {



    global $money, $requiredMoney;
    if ($money >= $requiredMoney) {
    $sql = 'SELECT money
            FROM accounts
            WHERE id = :id';
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['id' => $idRecipient]);
            $moneyRecipient = $stmt->fetchAll();
    }
}
?>