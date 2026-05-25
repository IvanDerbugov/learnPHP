<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php /*
    $test = '1';
    if (!$test):
        ?>
        <h1>test</h1>
        <?php
    elseif ($test == '1'):
        ?>
        <h2>test2</h2>
        <?php
    else:
        ?>
        <h3>test3</h3>
        <?php
    endif;
    */?>


<?php
    $test2 = '1';
    if ($test2):
        echo "<h1>test-2-1</h1>";
    elseif ($test2 == '1'):
        echo "<h2>test-2-2</h2>";
    else:
        echo "<h3>test-2-3</h3>";
    endif;
?>
</body>

</html>