<?php
    $ageStart = (int) ($_POST['age'] ?? 0);

    for ($ageStart; $ageStart <= 20; $ageStart++) {
        echo 'мне ' . $ageStart . '<br>';

        if ($ageStart == 20)  echo 'всё, я большой!';
    };
?>