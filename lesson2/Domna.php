<?php

class Forge
{
    public function burn($object)
    {
        $flame = $object->burn();
        echo $flame->render((string)$object) . PHP_EOL;
    }
}

class BlueFlame
{
    public function render($name)
    {
        return $name . " горит синим пламенем" . PHP_EOL;
    }
}

class RedFlame
{
    public function render($name)
    {
        return $name . " горит красным пламенем" . PHP_EOL;
    }
}

class Smoke
{
    public function render($name)
    {
        return $name . " лишь задымился" . PHP_EOL;
    }
}

class Shirt extends Forge
{
    public function burn()
    {
        return new BlueFlame();
    }

    public function __toString()
    {
        return "Рубашка";
    }
}

class Book extends Forge
{
    public function burn()
    {
        return new RedFlame();
    }

    public function __toString()
    {
        return "Книга";
    }
}

class Rug extends Forge
{
    public function burn()
    {
        return new Smoke();
    }

    public function __toString()
    {
        return "Ковер";
    }
}

class Ball extends Forge
{
    public function burn()
    {
        return new RedFlame();
    }

    public function __toString()
    {
        return "Мяч";
    }
}

class Cane extends Forge
{
    public function burn()
    {
        return new Smoke();
    }

    public function __toString()
    {
        return "Трость";
    }
}

$forge = new Forge();
echo $forge->burn(new Shirt());
echo $forge->burn(new Book());
echo $forge->burn(new Rug());
echo $forge->burn(new Ball());
echo $forge->burn(new Cane());
