<?
$path = $_SERVER['DOCUMENT_ROOT'] . '/learn-php/error-config.php';
if (file_exists($path)) {
    require_once $path;
} else
    echo 'error-config.php НЕ НАЙДЕН!' . "<br/>";

class Account
{
    function __construct(public $ownerWallet, private $sum = 0)
    {
        // $this->ownerWallet = $ownerWallet; //избыточно, пхп 8 сам присваивает на этапе public
        // $this->sum = $sum; // тоже самое
    }

    public static $bankName = 'IvanBank';
    function getDateNow()
    {
        return 'Дата: ' . date('H:i:s Y-m-d');
    }

    //тренировка работы со строками для отображения строки в красивом формате для пользователя
    function displayBeautifulName()
    {
        $result = explode('_', $this->ownerWallet);
        $firstBitResult = ucfirst($result[0]);
        $lastBitResult = array_slice($result, 1);
        $lastBitResult = implode(' ', $lastBitResult);
        $lastBitResult = strtoupper($lastBitResult);
        $result = $firstBitResult . ' ' . $lastBitResult;
        return $result; //derbugov_i_n -> Derbugov I N
    }
    function getSumFrom($otherAccount, $money)
    {
        if ($money > $otherAccount->sum) {
            echo "На аккауте \"{$otherAccount->ownerWallet}\" недостаточно средств для получение оттуда" . "<br/>";
            return;
        }
        $otherAccount->sum -= $money;
        $this->sum += $money;
        //старый способ вывода неполной инфы
        // echo "Получено {$money} с аккаунта \"{$otherAccount->displayBeautifulName()}\" на аккаунт \"{$this->displayBeautifulName()}\"" . "<br/>";
        $dateNow = $this->getDateNow();
        $bankName = self::$bankName;
        echo "<pre>";
        echo <<<TEXT
        Получено {$money}\$
        C аккаунта "{$otherAccount->displayBeautifulName()}"
        На аккаунт "{$this->displayBeautifulName()}"
        Остаток: {$this->sum}\$
        $dateNow
        $bankName
        TEXT;
        echo "</pre>";
    }

    function sendSumFrom($otherAccount, $money)
    {
        if ($money > $this->sum) {
            echo "На Вашем аккаунте ({$this->ownerWallet}) недостаточно средств для перевода. Необходимо: {$money}, доступно: {$this->sum}. Пополните счёт." . "<br/>";
            return;
        }
        $this->sum -= $money;
        $otherAccount->sum += $money;
        // echo "Отправлено {$money} с аккаунта \"{$this->displayBeautifulName()}\" на аккаунт \"{$otherAccount->displayBeautifulName()}\"" . "<br/>";
        $dateNow = $this->getDateNow();
        $bankName = self::$bankName;
        echo "<pre>";
        echo <<<TEXT
        Отправлено {$money}\$
        С аккаунта "{$this->displayBeautifulName()}"
        На аккаунт "{$otherAccount->displayBeautifulName()}"
        Остаток: {$this->sum}\$
        $dateNow
        $bankName
        TEXT;
    }

    function printSum()
    {
        echo "на счёте {$this->displayBeautifulName()} {$this->sum}\$" . "<br/>";
    }
}

$wallet_1 = new Account('derbugov_i_n', 500);
$wallet_2 = new Account('petrov_g_i', 1000);
$wallet_3 = new Account('rich woman', 15000);
$wallet_1->printSum();
$wallet_2->printSum();

//получить деньги с другого счёта. на рабочем варианте нужно права ещё для этого делать
$wallet_1->getSumFrom($wallet_2, 500);
$wallet_1->printSum();
$wallet_2->printSum();
echo '=======' . "<br/>";
$wallet_1->getSumFrom($wallet_3, 2000);
$wallet_3->sendSumFrom($wallet_1, 5000);
$wallet_3->sendSumFrom($wallet_2, 1000);
$wallet_1->printSum();
$wallet_2->printSum();
$wallet_3->printSum();
// echo "{$wallet_3->displayBeautifulName()}";

echo '=======' . "<br/>";
// echo $wallet_1->sum; //нельзя к privet напрямую