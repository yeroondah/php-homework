<?php

namespace rent;

class FlatToRent
{
    private $city;
    private $roomsQty;
    private $pricePerNight;
    private $available = true;

    public function __construct($cityName, $roomsQty, $price)
    {
        $this -> city = trim($cityName);
        $this -> roomsQty = trim($roomsQty);
        $this -> pricePerNight = trim($price);
    }

    public function getFullInfo()
    {
        return
        [
            'Город' => $this -> city,
            'Кол-во комнат' => $this -> roomsQty,
            'Цена за ночь' => $this -> pricePerNight,
            'Статус' => 
                $this -> available ? 'Квартира свободна' : 'Квартира уже занята'
        ];
    }

    public function isAvailable()
    {
        return $this -> available;
    }

    public function setAvailable($bool)
    {
        if (gettype($bool) === 'boolean') 
        {
            $bool ? $this -> available = $bool : $this -> available = $bool;
        }
    }

    public function rentThisFlat($daysQty)
    {
        if (!$this -> isAvailable()) {
            return 'Извините, квартира уже занята';
        }
        $currentCity = $this -> city;
        $this -> setAvailable(false);
        $finalPrice = $this -> pricePerNight * $daysQty;
        return "Вы сняли квартиру в городе $currentCity. Кол-во дней: $daysQty, Цена: $finalPrice рублей";
    }   
}