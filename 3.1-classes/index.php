<?php
require_once('classes/friend.php');
require_once('classes/discount.php');
require_once('classes/rent.php');
require_once('classes/buy.php');
require_once('functions.php');

$friendJack = new friend\Friend('Джэк');
$friendPaff = new friend\Friend('Пафнутий');

echo $friendJack -> tellAboutFriend() . '<br>';
echo $friendPaff -> tellAboutFriend() . '<br>';
echo '<hr>';

$checkPriceOne = new discount\FixedDiscount();
$checkPriceTwo = new discount\FixedDiscount();

echo $checkPriceOne -> calcDiscount(4000) . '<br>';
echo $checkPriceTwo -> calcDiscount(15570) . '<br>';
echo '<hr>';

$flatInMoscow = new rent\FlatToRent('Москва', 3, 3500);
showInfo($flatInMoscow -> getFullInfo());
echo '<hr>';
echo $flatInMoscow -> rentThisFlat(5) . '<br>';
echo '<hr>';
showInfo($flatInMoscow -> getFullInfo());
echo '<hr>';
echo $flatInMoscow -> rentThisFlat(2) . '<br>';
echo '<hr>';

$flatInKaluga = new rent\FlatToRent('Калуга', 1, 1300);
showInfo($flatInKaluga -> getFullInfo());
echo '<hr>';
echo $flatInKaluga -> rentThisFlat(10) . '<br>';
echo '<hr>';
showInfo($flatInKaluga -> getFullInfo());
echo '<hr>';
echo $flatInKaluga -> rentThisFlat(2) . '<br>';
echo '<hr>';


$cadillac = new car\CarToBuy('Cadillac', 'DeVille', 1989, '199 000 рублей');
showInfo($cadillac -> getFullInfo());
echo '<hr>';
echo $cadillac -> getCarAge() . '<br>';
echo '<hr>';

$jeep = new car\CarToBuy('Jeep', 'Wrangler', 2016, '3 780 000 рублей');
showInfo($jeep -> getFullInfo());
echo '<hr>';
echo $jeep -> getCarAge() . '<br>';
echo '<hr>';

