<?php

class Box
{
    public function putBall(Ball $ball)
    {
        echo "В корзину добавлен мяч" . PHP_EOL;
    }
}

class Ball
{
    public static $count;

    public static function createBall()
    {
        self::$count++;
    }
}

$box = new Box();

$count = rand(0, 10);

for ($i = 0; $i <= $count; $i++) {
    $box->putBall(Ball::createBall());
}
