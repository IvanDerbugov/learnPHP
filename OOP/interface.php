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
    public function dateSale(): string;
}
interface SaleTechnic extends Product, Sale
{
}

class SalePhones implements SaleTechnic
{
    function __construct(public string $modelPhone, public int $price)
    {
    }
    function dateSale(): string
    {
        return date('H:i:s d-m-Y');//всё время новая, надо фиксировать
    }

    function cheque () {
        echo "Спасибо за покупку {$this->modelPhone} в нашем магазине!" . "<br/>";
        echo "Цена: {$this->price}" . "<br/>";
        echo "Дата покупки: {$this->dateSale()}";
        //добавить дату конца гаратнии
        echo <<<TEXT
        
        TEXT;//добавить список рекламы
    }
}

$client1 = new SalePhones('iphone-15', 800);
$client1->cheque();