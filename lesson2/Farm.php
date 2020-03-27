<?php

// Включаем вывод всех ошибок
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

// Животное
abstract class Animal
{
    public function say()
    {

    }

    public function walk()
    {
        return "Топ-топ-топ" . PHP_EOL;
    }
}

// Птица
abstract class Bird
{
    public function say()
    {

    }

    public function tryToFly()
    {
        return "Вжих-вжих-топ-топ" . PHP_EOL;
    }
}

// Корова
class Cow extends Animal
{
    public function say()
    {
        return "Му-у-у-у";
    }
}

// Свинья
class Pig extends Animal
{
    public function say()
    {
        return "Хрю-хрю";
    }
}

// Курица
class Chicken extends Bird
{
    public function say()
    {
        return "Ко-ко-ко";
    }
}

// Гусь
class Goose extends Bird
{
    public function say()
    {
        return "Го-го-го";
    }
}

// Индюк
class Turkey extends Bird
{
    public function say()
    {
        return "Балдык-балдык";
    }
}

// Лошадь
class Horse extends Animal
{
    public function say()
    {
        return "Иго-го";
    }
}

// Класс для ферм
abstract class Farm
{
    public $animals = [];
}

// Ферма для птиц
class BirdFarm extends Farm
{
    // Метод, в котором птица говорит после ее добавления на ферму
    public function showAnimalsCount()
    {
        return "Птиц на ферме: " . count($this->animals);
    }
}

// Ферма для животных
class HoofFarm extends Farm
{

}

// Фермер
class Farmer
{
    // Метод, добавляющий животного на ферму
    function addAnimal(HoofFarm $farm, Animal $animal)
    {
        $farm->animals[] = $animal;
    }

    // Метод, добавляющий птицу на ферму
    function addBird(BirdFarm $birdFarm, Bird $bird)
    {
        $birdFarm->animals[] = $bird;
        $birdFarm->showAnimalsCount();
    }

    // Метод, производящий перекличку как животных, так и птиц
    public function rollCall(Farm $farm)
    {
        shuffle($farm->animals);

        foreach ($farm->animals as $animal) {
            echo $animal->say() . PHP_EOL;
        }
    }
}


$farmer = new Farmer(); // Фермер
$farm = new HoofFarm(); // Ферма с животными
$birdFarm = new BirdFarm(); // Ферма с птицами

// Создаем одну корову
$cow = new Cow();
$farmer->addAnimal($farm, $cow);

// Создаем 2-х свиней
$pig1 = new Pig();
$pig2 = new Pig();
$farmer->addAnimal($farm, $pig1);
$farmer->addAnimal($farm, $pig2);

// Создаем одну курицу
$chicken = new Chicken();
$farmer->addBird($birdFarm, $chicken);

// Создаем 3-х индюков
$turkey1 = new Turkey();
$turkey2 = new Turkey();
$turkey3 = new Turkey();
$farmer->addBird($birdFarm, $turkey1);
$farmer->addBird($birdFarm, $turkey2);
$farmer->addBird($birdFarm, $turkey3);

// Создаем 2- лошадей
$horse1 = new Horse();
$horse2 = new Horse();
$farmer->addAnimal($farm, $horse1);
$farmer->addAnimal($farm, $horse2);

// Создаем гуся
$goose = new Goose();
$farmer->addBird($birdFarm, $goose);

// Перекличка животных
$farmer->rollCall($farm);
$farmer->rollCall($birdFarm);
