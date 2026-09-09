<?
require_once $_SERVER['DOCUMENT_ROOT'] . '/learn-php/error-config.php';
class Books {
    const CHEAP_BOOKS_COST_MAX = 10;
    const EXPENSIVE_BOOKS_COST_MIN = 20;
    public $name, $autor, $pages, $price, $rating;
    function __construct($name, $autor, $pages, $price, $rating = null) {
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
}

$bookTomAndJerry = new Books('TomAndJerry', 'unknown', '360', 30);
$bookTomAndJerry -> bookReview();
$bookRecepts = new Books('Recepts', 'unknown', '100', 17, 5);
$bookRecepts -> bookReview();