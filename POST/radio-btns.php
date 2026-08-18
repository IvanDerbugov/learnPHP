<?
require_once __DIR__ . '/../error-config.php';
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form {
            margin-top: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            gap: 5px;
        }
    </style>
</head>

<body>
    <h3>Школьные предметы</h3>
    <form action="" method="POST">
        <div>
            <label for="matematics">Любимая математика</label>
            <input type="radio" name="favouriteSubject" id="matematics">
        </div>
        <div>
            <label for="physics">Любимая физика</label>
            <input type="radio" name="favouriteSubject" id="physics">
        </div>
        <div>
            <label for="physicalEducation">Любимая физкультура</label>
            <input type="radio" name="favouriteSubject" id="physicalEducation">
        </div>
        <label for="additionalSubject">выберете факультативы для посещения</label>
        <select name="additionalSubject[]" id="" size="1" multiple="multiple">
            <option value="matematics">математика</option>
            <option value="physics">физика</option>
        </select>
        <button>send</button>
    </form>
</body>

</html>