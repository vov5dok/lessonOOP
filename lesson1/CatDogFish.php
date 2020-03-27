<?php

namespace App\CatDogFish;

class Cat
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }
}

class Dog
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }
}

class Fish
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }
}

$cat1 = new Cat("Барсик");
$cat2 = new Cat("Усатик");
$cat3 = new Cat("Наполеон");

$dog1 = new Dog("Рыжик");
$dog2 = new Dog("Бимка");
$dog3 = new Dog("Кудряшка");
$dog4 = new Dog("Гарфилд");
$dog5 = new Dog("Жужик");

$fish = new Fish("Фреди");
