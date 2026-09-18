<?
$path = $_SERVER['DOCUMENT_ROOT'] . '/learn-php/error-config.php';
if (file_exists($path)) {
    require_once $path;
} else echo 'error-config.php НЕ НАЙДЕН!' . "<br/>";

class Account {
    public $ownerWallet = '';
    private $sum = 0;

    function __construct($ownerWallet, $sum) {
        $this->ownerWallet = $ownerWallet;
        $this->sum = $sum;
    }

    function getSumFrom ($otherAccount, $money) {
        $otherAccount->sum -= $money;
        $this->sum += $money;
    }

    function printSum () {
        echo "на счёте {$this->sum} \\$";
    }
}