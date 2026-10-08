<?
trait TextWrap
{
    public static function pWrap($text)
    {
        echo "<p>$text</p>" . "<br/>";
    }
    public static function h2Wrap($text)
    {
        echo "<h2>$text</h2>" . "<br/>";
    }
    public static function customWrap($tagName, $text)
    {
        echo "<$tagName>$text</$tagName>" . "<br/>";
    }
}

class ConstructArticles
{
    use TextWrap;
    function __construct(public $topic, public $autor)
    {
    }
}

$article_ProfitFood = new ConstructArticles('Health', 'Derboogov_Ivan');
$article_ProfitFood->customWrap('h1', 'Здоровая еда - основа долголетия');
$article_ProfitFood->h2Wrap('Что вы сегодня уже успели съесть?');
$article_ProfitFood->pWrap('Калифорнийским университетом было проведено исследование, которое показало: 9 из 10 долгожителей ели сугубо полезную еду.');

class HeandlerErrors
{
    use TextWrap;
    function __construct(private $codeResponse)
    {
    }

    function displayError ($errorInfo) {
        $this->customWrap('h1', 'Произошла критическая ошибка!');
        $this->pWrap("Детали ошибки: {$errorInfo}");
    }

    static function checkErrors () {
        //функционал теста тут будет
        HeandlerErrors::h2Wrap('Проверка завершена, ошибок не обнаружено');
    }
}

$customApp = new HeandlerErrors(500);
$customApp->displayError('HTTP ERROR 500');
HeandlerErrors::checkErrors();