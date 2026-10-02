<?
$path = $_SERVER['DOCUMENT_ROOT'] . '/learn-php/error-config.php';
if (file_exists($path)) {
    require_once $path;
} else echo 'error-config.php НЕ НАЙДЕН!' . "<br/>";

interface Product {
    public int $price {get; set;}
}
interface Sale {
    public function dateSale (): string;
}
interface SaleTechnic extends Product, Sale {}

class SalePhones implements SaleTechnic {
    function __construct(public int $price, public string $soldAt) {
        $this->soldAt = date('H:i:s Y-m-d');
    }
}