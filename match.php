<?php
$result = $_GET['result'] ?? 'ok';
$test = match ($result) {
    'ok' => 'great',
    'not ok' => 'bad',
    default => 'bad',
};
echo $test;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <script>
        const test = <?= json_encode($test) ?>;

        const match = location.search.match(/(?:^|[?&])result=([^&]*)/);
        const resultEncoded = match ? match[1] : '';
        const resultDecoded = resultEncoded
            ? decodeURIComponent(resultEncoded.replace(/\+/g, ' '))
            : null;

        console.log('result (в URL, закодировано):', resultEncoded || '(нет в адресе)');
        console.log('result (раскодировано):', resultDecoded);
        console.log('test (из PHP match):', test);
    </script>
</body>
</html>