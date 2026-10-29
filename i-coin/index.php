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
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>i-coin</title>
    <link rel="stylesheet" href="styles/base.css">
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/modal.css">
    <link rel="icon" href="img/coin-cash.svg">
</head>

<body>
    <? include "./partial/header.php"; ?>
    <main class="container">
        <div id="message">
            <? if (isset($_SESSION['message'])) { ?>
                <h2><?= $_SESSION['message'] ?></h2>
                <? $_SESSION['message'] = '' ?>
            <? } ?>
        </div>
    </main>

    <? include "./partial/modals-acc.html"; ?>
    <script src="scripts/script.js"></script>
    <script src="scripts/modal.js"></script>
</body>

</html>