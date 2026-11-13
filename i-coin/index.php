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
require_once $_SERVER['DOCUMENT_ROOT'] . '/learn-php/i-coin/service/methodsMoney/getUsers.php';
if (isset($_SESSION['id'])) {
    $money = getBalance($pdo, (int) $_SESSION['id']);
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>i-coin</title>
    <link rel="stylesheet" href="/learn-php/i-coin/styles/base.css">
    <link rel="stylesheet" href="/learn-php/i-coin/styles/header.css">
    <link rel="stylesheet" href="/learn-php/i-coin/styles/modal.css">
    <link rel="icon" href="/learn-php/i-coin/img/coin-cash.svg">
</head>

<body>
    <? include $_SERVER['DOCUMENT_ROOT'] . "/learn-php/i-coin/partial/header.php"; ?>
    <main class="container">
        <div id="message">
            <? if (isset($_SESSION['message'])) { ?>
                <h2><?= $_SESSION['message'] ?></h2>
                <? $_SESSION['message'] = '' ?>
            <? }
            if (isset($_SESSION['owner'])) { ?>
                <h2>Добро пожаловать, <?= $_SESSION['owner'] ?>!</h2>
            <? } ?>
        </div>

        <? if (isset($_SESSION['id'])) { ?>
            <br>
            <h3>Отправить деньги</h3>
            <form method="post" id="form-send-money">
                <div class="flex" style="justify-content: start;">
                    <p>Кому:</p>
                    <select name="recipientTransferId">
                        <? $users = getUsers($pdo);
                        foreach ($users as $user) {
                            if ($_SESSION['id'] == $user['id']) {
                                continue;
                            } ?>
                            <?= "<option value='{$user['id']}'> {$user['owner']} - {$user['id']} </option>" ?>
                        <? } ?>
                    </select>
                </div>
                <div class="flex" style="justify-content: start;">
                    <label for="sum">Сколько $:</label>
                    <input type="number" name="sumTransfer" placeholder="3" value="5">
                </div>
                <button type="submit" style="color: red">Отправить</button>
            </form>
        <? } ?>
    </main>

    <? include $_SERVER['DOCUMENT_ROOT'] . "/learn-php/i-coin/partial/modals-acc.html"; ?>
    <script src="/learn-php/i-coin/scripts/script.js"></script>
    <script src="/learn-php/i-coin/scripts/modal.js"></script>
    <script src="/learn-php/i-coin/scripts/sendMoney.js"></script>
</body>

</html>