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

    function getSumFrom($otherAccount, $money)
    {
        $otherAccount->sum -= $money;
        $this->sum += $money;
    }

    //тренировка работы со строками для отображения строки в красивом формате для пользователя
    function displayBeautifulName () {
        $result = explode('_', $this->ownerWallet);
        $firstBitResult = ucfirst($result[0]);
        $lastBitResult = array_slice($result, 1);
        $lastBitResult = implode(' ' , $lastBitResult);
        $lastBitResult = strtoupper($lastBitResult);
        $result = $firstBitResult . ' ' .  $lastBitResult;
        return $result; //derbugov_i_n -> Derbugov I N
    }

    function printSum()
    {
        echo "на счёте {$this->displayBeautifulName()} {$this->sum}\$"  . "<br/>";
    }
}

$wallet_1 = new Account('derbugov_i_n');
$wallet_2 = new Account('petrov_g_i', 1000);
$wallet_2->printSum();
