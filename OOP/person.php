<?

$path = $_SERVER['DOCUMENT_ROOT'] . '/learn-php/error-config.php';
if (file_exists($path)) {
    require_once $path;
} else echo 'error-config.php НЕ НАЙДЕН!' . "<br/>";

class Person
{
    function __construct(public $name, public $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    function sayHi()
    {
        echo "Привет, {$this->name}!<br><br>";
    }

    function analysisLetterName()
    {
        $arrName = mb_str_split($this->name);
        // echo var_dump($arrName);
        $counter = 1;
        foreach ($arrName as $letter) {
            echo "{$counter}) {$letter}<br>";
            $counter++;
        }
        echo "<br>";
    }

    final function lastFunction() {
        echo 'конец класса'  . "<br/>"  . "<br/>";
    }
}

$Ivan = new Person('Ivan', 25);
$Ivan->sayHi();
$Ivan->analysisLetterName();

class Usergame extends Person
{
    function __construct($name, $age, public $gameLvl = 1, public $score = 0)
    {
        parent::__construct($name, $age);
        $this->gameLvl = $gameLvl;
        $this->score = $score;
    }

    function sayHi()
    {
        echo "Приветствую тебя в скайриме, {$this->name}!<br><br>";
    }

    function analysisLetterName()
    {
        echo "Каждая буква твоего имени содержит уникальнкую силу...<br>";
        parent::analysisLetterName();
    }

    //положит стр с 500-ой
    // function lastFunction() {
    //     parent::lastFunction();
    // }
    
}

$Ivan2000 = new Usergame('Ivan2000', 25, score: 100);
$Ivan2000->sayHi();
$Ivan2000->analysisLetterName();
$Ivan2000->lastFunction();

if ($Ivan instanceof Person) {
    echo '$Ivan пренадлежит Person' . "<br/>";
} else
    echo '$Ivan НЕ пренадлежит Person' . "<br/>";
if ($Ivan instanceof Usergame) {
    echo '$Ivan пренадлежит Usergame' . "<br/>";
} else
    echo '$Ivan НЕ пренадлежит Usergame' . "<br/>";

if ($Ivan2000 instanceof Person) {
    echo '$Ivan2000 пренадлежит Person' . "<br/>";
} else
    echo '$Ivan2000 НЕ пренадлежит Person' . "<br/>";
if ($Ivan2000 instanceof Usergame) {
    echo '$Ivan2000 пренадлежит Usergame' . "<br/>";
} else
    echo '$Ivan2000 НЕ пренадлежит Usergame' . "<br/>";