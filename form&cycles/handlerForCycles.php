<?php
    $ageStart = (int) ($_POST['age'] ?? 0);

    if ($ageStart > 20) {
        echo 'и так уже большой, ' . $ageStart; 
        die();
    }

    if ($ageStart >= 0 && $ageStart <= 20) {
        for ($ageStart; $ageStart <= 20; $ageStart++) {
            echo 'мне ' . $ageStart . '<br>';
            if ($ageStart == 20) echo 'всё, я большой!!';
        };
    } else echo 'некорректное значение';

?>