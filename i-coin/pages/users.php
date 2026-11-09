<?
$path = $_SERVER['DOCUMENT_ROOT'] . '/learn-php/error-config.php';
if (file_exists($path)) {
    require_once $path;
} else {
    echo 'error-config.php НЕ НАЙДЕН!' . "<br/>";
}
session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/learn-php/i-coin/service/db.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/learn-php/i-coin/service/getBalanceFromId.php';
if (isset($_SESSION['id'])) {
    $money = getBalance($pdo, (int) $_SESSION['id']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Юзеры i-coin</title>
    <link rel="stylesheet" href="/learn-php/i-coin/styles/base.css">
    <link rel="stylesheet" href="/learn-php/i-coin/styles/header.css">
    <link rel="stylesheet" href="/learn-php/i-coin/styles/modal.css">
    <link rel="stylesheet" href="/learn-php/i-coin/styles/users.css">
    <link rel="icon" href="/learn-php/i-coin/img/coin-cash.svg">
</head>

<body>
    <? include $_SERVER['DOCUMENT_ROOT'] . "/learn-php/i-coin/partial/header.php"; ?>
    <main class="container">
        <h2>Пользователи i-coin:</h2>
        <?
        if (isset($_SESSION['id'])) {
            $sql = 'SELECT id, owner, money, displayBalance
                    FROM accounts
                    ORDER BY (id = :id) DESC, id';
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['id' => (int) $_SESSION['id']]);
            $users = $stmt->fetchAll();
            // print_r($stmt);
        ?>
            <div class='table-users'>
                <div class='table-users_row table-users_head'>
                    <div class='table-users_row_user'>Имя</div>
                    <div class='table-users_row_user'>Баланс</div>
                </div>
                <? foreach ($users as $user) { ?>
                    <div class='table-users_row' <?= $user['id'] == $_SESSION['id'] ? "style='background: #c0f2c6;'" : '' ?>> <!--если сравнивать по owner может совпасть не одно значение - тк эта колока не уникальная в БД -->
                        <div class='table-users_row_user'>
                            <?= htmlspecialchars($user['owner'], ENT_QUOTES, 'UTF-8') . $user['id']?> 
                        </div>
                        <div class='table-users_row_user'>
                        <? if ($user['displayBalance'] || $user['id'] == $_SESSION['id']) {
                            echo $user['money'] . '$';
                            } else {
                            echo 'скрыто';
                            }
                        ?>
                       </div>
                    </div>
                <? } ?>
            </div>
        <? } else {
            echo "Авторизуйтесь или зарегистрируйтесь для доступа";
        } ?>
    </main>

    <? include $_SERVER['DOCUMENT_ROOT'] . "/learn-php/i-coin/partial/modals-acc.html"; ?>
    <script src="/learn-php/i-coin/scripts/script.js"></script>
    <script src="/learn-php/i-coin/scripts/modal.js"></script>
</body>

</html>