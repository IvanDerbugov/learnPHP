<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <script>
        function getStartAge () {
            if(!new URLSearchParams(location.search).has('age')) {
                const startAge = +prompt ('С какого возраста начать пхп цикл?', 0)
                if (!startAge && startAge <= 20) {
                    getStartAge()
                    return
                }
                location.search = '?age=' + encodeURIComponent(startAge);
            }
        }
        getStartAge()
    </script>
    <?php
    $age = $_GET['age'] ?? 0;
        if($age) {
            for ($age; $age <= 20; $age++) {
                echo "мне " . $age . "<br>";
                if ($age == 20) echo "я большой!";
            }
        }
    ?>
</body>
</html>