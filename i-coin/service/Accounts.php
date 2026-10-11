<?
$path = $_SERVER['DOCUMENT_ROOT'] . '/learn-php/error-config.php';
if (file_exists($path)) {
    require_once $path;
} else
    echo 'error-config.php НЕ НАЙДЕН!' . "<br/>";

class Account
{
    function __construct(public $owner, protected int $money = 0)
    {
    }

    public function printMoney () {
        return $this->money . '$';
    }

    public static $bankName = 'i-coin';
    function getDateNow()
    {
        return 'Дата: ' . date('H:i:s Y-m-d');
    }

    public function sendMoney ($recipient, $sum) {
        if ($this->money <= $sum) {
            echo "На Вашем аккаунте ({$this->owner}) недостаточно средств для перевода. Необходимо: {$sum}, доступно: {$this->printMoney()}. Пополните счёт." . "<br/>";
            return;
        } 
        $this->money -= $sum;
        $recipient->money += $sum;
        $dateNow = $this->getDateNow();
        $bankName = self::$bankName;
        echo "<pre>";
        echo <<<TEXT
        Отправлено {$sum}\$
        С аккаунта "{$this->owner}"
        На аккаунт "{$recipient->owner}"
        Остаток: {$this->printMoney()}
        $dateNow
        $bankName
        TEXT;
        echo "</pre>";
    } 

    function getSumFrom($recipient, $sum)
    {
        if ($sum > $recipient->money) {
            echo "На аккауте \"{$recipient->ownerWallet}\" недостаточно средств для получение оттуда" . "<br/>";
            return;
        }
        $recipient->money -= $sum;
        $this->money += $sum;
        $dateNow = $this->getDateNow();
        $bankName = self::$bankName;
        echo "<pre>";
        echo <<<TEXT
        Получено {$sum}\$
        C аккаунта "{$recipient->owner}"
        На аккаунт "{$this->owner}"
        Остаток: {$this->printMoney()}
        $dateNow
        $bankName
        TEXT;
        echo "</pre>";
    }

    function accountBalance()
    {
        echo "на счёте {$this->owner} {$this->printMoney()}" . "<br/>";
    }

}

class SavingsAccount extends Account {
    function addPracent ($pracent) {
        $this->money *= 1 + $pracent/100;
        echo "На счёт {$this->owner} добавлено $pracent процент(а), на счету {$this->printMoney()}"  . "<br/>";
    }
}

// $userId_1 = new Account('Derbugov Ivan', 500);
// $userId_1->accountBalance();

// $userId_2 = new Account('Indi Romeo', 600);
// $userId_2->accountBalance();
// $userId_2->sendMoney($userId_1, 50);

// $userId_3 = new SavingsAccount('Petrov Petr', 100);
// $userId_3->addPracent(3);