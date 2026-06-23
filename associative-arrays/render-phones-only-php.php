<?
require_once __DIR__ . '/../error-config.php';

if(!isset($_GET['brand'])) {
    header ('Location: ' . $_SERVER['PHP_SELF'] . '?brand=apple');
    exit;
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?
$phones = array(
    "apple"=> array("iPhone 12", "iPhone X", "iPhone 12 Pro") , 
    "samsumg"=>array("Samsung Galaxy S20", "Samsung Galaxy S20 Ultra"),
    "nokia" => array("Nokia 8.3", "Nokia 3.4"));
    // $phones['apple']['iPhone 12 Pro'] = 'iPhone 12 Pro Max'; //заменить по ключу значение
    $selectedBrand = $_GET['brand'];

    echo "<form method='get' action=''> 
    <select name='brand' onchange='this.form.submit()'>";

    foreach ($phones as $brand => $model) {
        if($brand === $selectedBrand) {  //чтобы не сбрасывалось после перезарузки
            echo "<option selected>" . "$brand" . "</option>";
        } 
        else echo "<option>" . "$brand" . "</option>";
    };

    echo "</select> 
    </form>";

    echo "<form method='post' action=''> 
    <select name='model'>";
    foreach ($phones[$selectedBrand] as $model) {
        echo "<option>" . "$model" . "</option>";
    };
    echo "</select> 
    <button type='submit'>send choice</button>
    </form> ";
?>
</body>
</html>