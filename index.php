<?php
$debug = true; // true для обучения/локалки, false для обычного режима

ini_set('error_log', __DIR__ . '/php-errors.log');

if ($debug) {
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    ini_set('log_errors', '1');
} else {
    error_reporting(E_ALL);
    ini_set('display_errors', '0');
    ini_set('display_startup_errors', '0');
    ini_set('log_errors', '1');
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>METANIT.COM</title>
    <meta charset="utf-8">
</head>

<body>
    <h2>Введи свои данные:</h2>
    <form action="display.php" method="POST">
        <p>Введите имя: <input type="text" name="firstname" /></p>
        <p>Введите фамилию: <input type="text" name="lastname" /></p>
        <input type="submit" value="Отправить">
    </form>
    <div>Супер-счёт: 2+10 =
        <?php echo 2 + 10 ?>
    </div>
    <?php
    $i = 'secret info';
    echo "
    <div>
        <h3>секрет:</h3>
        <p>$i</p>
    </div>
    ";
    ?>

    <?php
    $num;
    echo 'num = ' . ($num ?? 'num не задано') . '<br>' . 'num = ' . ($num ?? 'опять не задано');
    ?>

    <?php
    // Все числа в десятичной системе имеют значение 28
    $num_10 = 28; // десятичное число
    $num_2 = 0b11100; // двоичное число (28 в десятичной системе)
    $num_8 = 034; // восьмеричное число (28 в десятичной)
    $num_16 = 0x1C; // шестнадцатиричное число (28 в десятичной)
    echo "num_10 = $num_10 <br>";
    echo "num_2 = $num_2 <br>";
    echo "num_8 = $num_8 <br>";
    echo "num_16 = $num_16";
    ?>

</body>

</html>