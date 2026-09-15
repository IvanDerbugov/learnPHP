<?
require_once __DIR__ . '/../error-config.php';

$anonymous = new class ('Vanya', 25, 'middle') {
    function __construct(public $name, public $age, public $lvl)
    {
        $this->name = $name;
        $this->age = $age;
        $this->lvl = $lvl;
    }

    function displayInfo()
    {
        // echo 'Hi, my name is ' . $this->name . '. I\'m ' . $this->age . ' years old.' . ' I have ' . $this->lvl . ' level.' ;
        echo "Hi, my name is {$this->name}. I'm {$this->age} years old. I have {$this->lvl} level.";
    }
};
$anonymous->displayInfo();