<?

class Lead
{
    private static $password = '123.';
    private $id;
    private static $counter = 0;
    function __construct(public $name)
    {
        self::$counter++;
        $this->id = self::$counter;
    }

    static function displayInfo($userPassword, $userName)
    {
        if ($userPassword !== self::$password) {
            echo "неверный пароль <br>";
            return;
        } else if ($userPassword === self::$password) {
            if (!$userName->name) {
                echo "Имя не найдено <br>";
            }
            else {
                echo "Имя: $userName->name, id: $userName->id <br>";
            }
        }
    }
}

$tom = new Lead('Tomas');
$gerob = new Lead('Gerob');
Lead::displayInfo('12345', $tom);
Lead::displayInfo('123.', $to);
Lead::displayInfo('123.', $gerob);

