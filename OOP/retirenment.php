<?
$path = $_SERVER['DOCUMENT_ROOT'] . '/learn-php/error-config.php';
if (file_exists($path)) {
    require_once $path;
} else
    echo 'error-config.php НЕ НАЙДЕН!' . "<br/>";

class Person
{
    static $retirenmentAgeMan = 63;
    static $retirenmentAgeWoman = 58;
    function __construct(public $name, public $age, public $isMan)
    {
    }
    function sayHi()
    {
        echo "Привет, меня зовут {$this->name}" . "<br/>";
    }

    function printAge()
    {
        $gender = $this->isMan ? 'мужской' : 'женский';
        echo "<pre>";
        echo <<<TEXT
        Имя: {$this->name};
        Возраст: {$this->age};
        Пол: {$gender};
        TEXT; 
        echo "</pre>" . "<br/>";
    }

    static function whenRetirenment ($person) {
        $rightRetirenment = $person->isMan ? self::$retirenmentAgeMan : self::$retirenmentAgeWoman;
        $yearsLeft = $rightRetirenment - $person->age;
        if($yearsLeft <= 0) {
            echo "Пора на пенсию, {$person->name}!";
        } else {
            echo "До пенсии {$yearsLeft} лет.";
        }
    }
}

$lida = new Person('Lida', 56, 0);
$lida->sayHi();
$lida->printAge();
Person::whenRetirenment ($lida);