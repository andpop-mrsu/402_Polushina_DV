<?php

namespace App;

class Standart implements HotelRoom
{
    private static $price = 2000;
    private static $description = "Стандарт";

    public function getDescription()
    {
        return "Класс: " . self::$description;
    }

    public function getPrice()
    {
        return self::$price;
    }
}
