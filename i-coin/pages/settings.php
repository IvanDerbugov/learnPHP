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
require_once $_SERVER['DOCUMENT_ROOT'] . '/learn-php/i-coin/service/displayBalance.php';
if (isset($_SESSION['id'])) {
    $money = getBalance($pdo, (int) $_SESSION['id']);
    $displayBalance = displayBalance($pdo, (int) $_SESSION['id']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <link rel="stylesheet" href="/learn-php/i-coin/styles/base.css">
    <link rel="stylesheet" href="/learn-php/i-coin/styles/header.css">
    <link rel="stylesheet" href="/learn-php/i-coin/styles/modal.css">
    <link rel="icon" href="/learn-php/i-coin/img/coin-cash.svg">
</head>

<body>
    <? include $_SERVER['DOCUMENT_ROOT'] . "/learn-php/i-coin/partial/header.php"; ?>
    <main class="container">
        <? if (isset($_SESSION['id'])) { ?>
            <div id="wrapDisplayBalance">
                <input type="checkbox" id="displayBalance" <?= $displayBalance ? 'checked' : '' ?>>
                <label for="displayBalance">Показывать свой баланс всем?</label>
            </div>
        <? } ?>
    </main>
    <? include $_SERVER['DOCUMENT_ROOT'] . "/learn-php/i-coin/partial/modals-acc.html"; ?>
    <script src="/learn-php/i-coin/scripts/script.js"></script>
    <script src="/learn-php/i-coin/scripts/modal.js"></script>
    <script src="/learn-php/i-coin/scripts/settings.js"></script>
</body>

</html>