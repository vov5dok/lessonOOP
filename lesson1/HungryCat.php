<?php

namespace App\HungryCat;

class HungryCat
{
    public $name;
    public $color;
    public $favoriteFood;

    public function __construct($name, $color, $favoriteFood)
    {
        $this->name = $name;
        $this->color = $color;
        $this->favoriteFood = $favoriteFood;
    }

    public function eat($food)
    {
        echo "Голодный кот " . $this->name . ", особые приметы: цвет - " . $this->color . ", съел - " . $food . ".<br>";
        if ($food == $this->favoriteFood) {
            echo "и замурчал 'мррррр' от своей любимой еды...<br>";
        }
    }
}

$cat1 = new HungryCat("Барсик", "Черный", "Колбасу");
$cat1->eat("Молоко");
$cat1->eat("Тушенку");
$cat1->eat("Кусочек булочки");
$cat1->eat("Колбасу");
$cat1->eat("Вискас");

$cat2 = new HungryCat("Наполеон", "Серый", "Вискас");
$cat2->eat("Колбасу");
$cat2->eat("Вискас");
$cat2->eat("Кусочек булочки");
$cat2->eat("Молоко");
$cat2->eat("Тушенку");
