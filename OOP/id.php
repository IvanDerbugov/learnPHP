<?
$path = $_SERVER['DOCUMENT_ROOT'] . '/learn-php/error-config.php';
if (file_exists($path)) {
    require_once $path;
} else echo 'error-config.php НЕ НАЙДЕН!' . "<br/>";
echo <<<HTML
    <style>
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
    </style>
    <form method="post">
        <input type="text" name="name" placeholder="Введите имя" required>
        <input type="password" name="password" placeholder="Введите пароль" required>
        <input type="submit" value="Отправить">
    </form>
HTML;
class Lead
{
    static $password = '123.';
    private $id;
    private static $counter = 0;
    function __construct(public $name)
    {
        self::$counter++;
        $this->id = self::$counter;
    }

    static function displayInfo($userPassword, $userName)
    {
        if ($userPassword === self::$password) {
            if (!$userName->name) {
                echo "Имя не найдено <br>";
            } else {
                echo "Имя: $userName->name, id: $userName->id <br>";
            } 
        }
    }
}

$tom = new Lead('Tomas');
$gerob = new Lead('Gerob');
// Lead::displayInfo('12345', $tom);
// Lead::displayInfo('123.', $to);
// Lead::displayInfo('123.', $gerob);

if (isset ($_POST['name'], $_POST['password'])) {
    echo "<br> -----<br>";
    if ($_POST['password'] === Lead::$password) {
        $fullVariable = $_POST['name'];
        Lead::displayInfo($_POST['password'], $$fullVariable);
    } else {
        echo "неверный пароль <br>";
    }
}

?>