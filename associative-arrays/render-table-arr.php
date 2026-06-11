<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        td {
            border: 1px solid #000;
            padding: 1px;
        }
    </style>
</head>
<body>
    <table>
    <?
    require_once __DIR__ . '/../error-config.php';

    $users = ['Jessy', 'Bob', ['Merry', 'Cem'], 'Pit', 'Rob', [[['Sausy']], 'Veranda']];
    $countTd = 0; //счётчик чтобы в нужный момент tr сделать
    function isArr ($arr) { //функция для перебора многовложенного массива
        foreach($arr as $value) {
            global $countTd;
            if (!is_array($value)) {//если значение не массив - то глубже заходить не надо
                if ($countTd === 0) echo "<tr>"; //открываем строку tr
                echo "<td>" . $value . "</td>"; //всегда выводим значение td
                $countTd++;
                if ($countTd === 3) { 
                    echo"</tr>"; //закрываем строку tr
                    $countTd = 0;
                };
            } else if (is_array($value)) {
                isArr($value);
            };
    
        };
    }
    isArr($users)
    
    ?>
    </table>
</body>
</html>