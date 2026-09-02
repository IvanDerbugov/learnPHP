<?
class House {
    public $numLastOwners, $numRooms, $price;
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

$cheapestPrice = function () use ($houses) {
    $minPrice = $houses[0]->price; //просто подставляем первый дом
    foreach ($houses as $house) {
        $currentPrice = $house->price; 
        if ($currentPrice < $minPrice) $minPrice = $currentPrice; 
    }
    return $minPrice;
};

echo "<br/>" . 'самый дешёвый дом стоит: ' . $cheapestPrice() . ' руб';