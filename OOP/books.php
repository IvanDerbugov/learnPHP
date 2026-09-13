<?
require_once $_SERVER['DOCUMENT_ROOT'] . '/learn-php/error-config.php';
class Books {
    const CHEAP_BOOKS_COST_MAX = 10;
    const EXPENSIVE_BOOKS_COST_MIN = 20;
    function __construct(public $name, public $autor, public $pages, public $price, public $rating = null) {
        $this->name = $name;
        $this->autor = $autor;
        $this->pages = $pages;
        $this->price = $price; //be point out in $
        $this->rating = $rating;
    }
    function bookReview () {
        if ($this->price <= self::CHEAP_BOOKS_COST_MAX) {
            echo "book \"$this->name\" is cheap" . "<br/>";
        } else if ($this->price > self::EXPENSIVE_BOOKS_COST_MIN) {
            echo "book \"$this->name\" is expensive" . "<br/>";
        } else {
            echo "price book \"$this->name\" is middle" . "<br/>";
        }
    }

    function __destruct() {
        echo $this->name . ' уничтожена'  . "<br/>";
    }
}

$bookTomAndJerry = new Books('Tom and Jerry', 'unknown', 360, 30);
$bookTomAndJerry -> bookReview();
$bookRecepts = new Books('Recepts', 'unknown', 100, 17, 5);
$bookRecepts -> bookReview();
// unset($bookRecepts);
echo 'скрипт ещё идёт...'  . "<br/>";

$bookGarryPotter = new Books('Garry Potter', 'Tom Royling', 1050, 35, 4.8);
$bookGarryPotter -> bookReview();