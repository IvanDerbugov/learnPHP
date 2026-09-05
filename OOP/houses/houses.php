<?
require_once $_SERVER['DOCUMENT_ROOT'] . '/learn-php/error-config.php';
class House {
    public $numLastOwners, $numRooms, $price;
    function pricePerRoom () {
        echo "($this->price / $this->numRooms)";
    }
}


$house_Ilimskay_33 = new House();
$house_Ilimskay_33->numRooms = 3;
$house_Ilimskay_33->price = 105000;
// echo '$house_Ilimskay_33: ' . print_r($house_Ilimskay_33, true);

$house_Ilimskay_40 = new House();
$house_Ilimskay_40->numRooms = 2;
$house_Ilimskay_40->price = 80000;
$house_Ilimskay_40->numLastOwners = 2;

$house_Ilimskay_42 = new House();
$house_Ilimskay_42->numRooms = 2;
$house_Ilimskay_42->price = 90000;
$house_Ilimskay_42->numLastOwners = 1;

//важно добавлять сюда каждый новый дом
$houses = [$house_Ilimskay_33, $house_Ilimskay_40, $house_Ilimskay_42];

$cheapestHouse = function () use ($houses) {
    $minHouse = $houses[0]; //просто подставляем первый дом, потенциально он самый дешёвый
    foreach ($houses as $house) {
        $currentHousePrice = $house->price;
        if ($minHouse->price > $currentHousePrice) $minHouse = $house;
    }
    return $minHouse;
};

$cheapestPrice = $cheapestHouse()->price;
$cheapestRoom = $cheapestPrice / $cheapestHouse()->numRooms;

echo "<br/>" . 'самый дешёвый дом стоит: ' . "$cheapestPrice" . ' руб' . "<br/>";
echo "одна комната самого дешёвого дома стоит: " . "$cheapestRoom" . ' руб' . "<br/>";