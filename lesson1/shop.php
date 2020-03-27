<?php

include __DIR__ . '/user.php';

/**
* Класс, содержащий заказ
*/
class Order
{
    private $basket;

    public function __construct(Basket $basket)
    {
        $this->basket = $basket;
    }

    /**
    * Метод, возврщающий корзину заказа
    */
    public function getBasket()
    {
        return $this->basket;
    }

    /**
    * Метод, возвращающий общую стоимость заказа
    */
    public function getPrice()
    {
        return $this->getBasket()->getPrice();
    }
}

/**
* Класс, показывающий корзину
*/
class Basket
{
    public $productBasket = [];
    private $priceOrder;

    /**
    * Метод, добавляющий товар в корзину
    */
    public function addProduct(Product $product, $quantity)
    {
        $this->productBasket[] = [0 => $product, 1 => $quantity];
        $this->priceOrder += $product->getPrice() * $quantity;
    }

    /**
    * Метод, возвращающий общую стоимость заказа
    */
    public function getPrice()
    {
        return $this->priceOrder;
    }

    /**
    * Метод, возвращающий информацию о корзине
    */
    public function describe($i)
    {
        return $this->productBasket[$i][0]->getName() . '. Цена: ' . $this->productBasket[$i][0]->getPrice() . '. Кол-во: ' . $this->productBasket[$i][1];
    }
}

/**
* Класс, показывающий товар
*/
class Product
{
    private $name;
    private $price;

    public function __construct($name, $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    /**
    * Метод, возвращающий наименование товара
    */
    public function getName()
    {
        return $this->name;
    }

    /**
    * Метод, возврщающий стоимость товара
    */
    public function getPrice()
    {
        return $this->price;
    }
}


// Создаем 3 товара
$product1 = new Product("Ноутбук", 50000);
$product2 = new Product("ПК", 90000);
$product3 = new Product("Love is...", 20);

// Добавляем созданные товары в корзину
$basket = new Basket;
$basket->addProduct($product1, 3);
$basket->addProduct($product2, 5);
$basket->addProduct($product3, 10);

// Создаем заказ
$order = new Order($basket);

$productBasket = $order->getBasket();
// Выводим заказ и общую стоимость заказа
echo "Итого в заказе:<br>";
for ($i = 0; $i < count($productBasket->productBasket); $i++) {
    echo $basket->describe($i) . "<br>";
}
echo "<br>Общая стоимость: " . $order->getPrice();


//Создаем уведомление клиенту Николаев Николай Николаевич
echo "<hr>";
$message = '<br>Для Вас создан заказ на сумму: ' . $order->getPrice() . '.<br>Состав: <br>';
for ($i = 0; $i < count($productBasket->productBasket); $i++) {
    $message .= $basket->describe($i) . "<br>";
}
$user = new User('Николаев Николай Николаевич', 'nikolaich@mail.ru', 'man', '25');
echo $user->notify($message);
