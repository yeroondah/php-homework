<?php

namespace car;

class CarToBuy
{
    private $carName;
    private $carModel;
    private $prodYear;
    private $price;

    public function __construct($name, $model, $year, $price)
    {
        $this -> carName = $name;
        $this -> carModel = $model;
        $this -> prodYear = $year;
        $this -> price = $price;
    }

    public function getCarAge()
    {
        $year = date('Y');
        $age =  $year - $this -> prodYear;
        return "Возраст машины: $age";
    }

    public function getFullInfo()
    {
        return
        [
            'Марка' => $this -> carName,
            'Модель' => $this -> carModel,
            'Год выпуска' => $this -> prodYear,
            'Цена' => $this -> price
        ];
    }
}