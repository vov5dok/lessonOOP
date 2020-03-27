<?php

class ToyFactory
{
    public function createToy($name)
    {
        $randomPrice = rand(5, 100);
        return new Toy($name, $randomPrice);
    }
}

class Toy
{
    public $name;
    public $price;

    public function __construct($name, $price)
    {
        $this->name = $name;
        $this->price = $price;
    }
}

$arrName = ["Самолет", "Кукла", "Машинка", "Автобус", "Танк"];

$buggy = new ToyFactory;

$count = rand(5, 20);
$price = 0;
for ($i = 1; $i <= $count; $i++) {
    $toy = $buggy->createToy($arrName[array_rand($arrName, 1)]);
    $price += $toy->price;
    echo "$i) " . $toy->name . " - " . $toy->price . PHP_EOL;
    echo "<br>";
}
echo "Итого - $price";