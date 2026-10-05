<?
$path = $_SERVER['DOCUMENT_ROOT'] . '/learn-php/error-config.php';
if (file_exists($path)) {
    require_once $path;
} else
    echo 'error-config.php НЕ НАЙДЕН!' . "<br/>";

interface Product
{
    public string $modelPhone { get; set; }
    public int $price { get; set; }

    //добавить гарантию
}
interface Sale
{
    public string $dateSale { get; set; }
    public int $monthsGuarantee { get; set; }
}
interface SaleTechnic extends Product, Sale
{
}

class SalePhones implements SaleTechnic
{
    function __construct(public string $modelPhone, public int $price, public int $monthsGuarantee = 0, public string $dateSale = '')
    {
        if ($monthsGuarantee < 0) {
            throw new Exception('Гарантия не может быть отрицательной');
        }
        $this->dateSale = date('H:i:s d-m-Y');
    }

    function cheque()
    {
        echo "Спасибо за покупку {$this->modelPhone} в нашем магазине!" . "<br/>";
        echo "Цена: {$this->price}\$" . "<br/>";
        echo "Дата покупки: {$this->dateSale}" . "<br/>";
        // echo get_debug_type($this->dateSale);
        if ($this->monthsGuarantee) {
            echo "Гарантия {$this->monthsGuarantee} месяца(ев)" . "<br/>";
        } else echo "Гарантии нет" . "<br/>";
        //добавить дату конца гаратнии
        echo "<pre>";
        echo <<<TEXT
        Скидка 10% в аквапарк "Волна" по промокоду "Здравствуй осень".
        Скидка 3% на АЗС по промокоду "Газ".
        ==================
        TEXT;
        echo "</pre>";
    }
}

$client1 = new SalePhones('iphone-15', 800, 24);
$client1->cheque();