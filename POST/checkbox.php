<?
require_once __DIR__ . '/../error-config.php';
$userName;
$userPassword;
$isRemember;
var_dump($_POST);
echo "<br/>" . '-----' . "<br/>";

if (
    isset($_POST['userName'], $_POST['userPassword'])
    && $_POST['userName'] != '' && $_POST['userPassword'] != ''
) {
    $userName = $_POST['userName'];
    $userPassword = $_POST['userPassword'];
    if (isset($_POST['isRemember'])) {
        $isRemember = $_POST['isRemember'];
    }
    trim($userName); // удалим пробелы из начала и конца имени, для пароля не надо такого и для чекбокса подавно
    //методы работы с БД тут будут.
    echo 'Hi, ' . $userName . '!' . "<br/>";
    echo 'You\'re password longer then 5 simbols: ';
    if (mb_strlen($userPassword) > 5) {
        echo 'yes';
    } else {
        echo 'no';
    }
    ;
    if (isset($_POST['isRemember']) && $isRemember === '1') 
        echo "<br/>" . 'Remembered';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            gap: 5px;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <form action="" method="POST">
        <input type="text" name="userName" placeholder="you're name" required>
        <input type="password" name="userPassword" placeholder="you're password" required>
        <div>
            <input type="checkbox" id="isRemember" name="isRemember" value="1" checked="checked">
            <label for="isRemember">remember me</label>
        </div>
        <button>submit</button>
    </form>
</body>

</html>