<?php
namespace discount;

class FixedDiscount
{
    private static $discountTen = 10;
    private static $discountFive = 5;
    
    public function calcDiscount($price)
    {
        if($price < 5000) {
            $finalPrice = $price - $price * self::$discountFive / 100;
            $discount = $price - $finalPrice;
            return 'Ваша скидка с ' . $price . 'руб : ' . $discount . 'руб.';
        } 
        else
        {
            $finalPrice = $price - $price * self::$discountTen / 100;
            $discount = $price - $finalPrice;
            return 'Ваша скидка с ' . $price . 'руб : ' . $discount . 'руб.';
        }
    }
}
