<?php
class Test
{
    public $name;
    public $price;

    public function __construct($name, $price)
    {
        $this->name = $name;
        $this->price = $price;
    }
}

$oTest = new Test('Машинка', 500);
$oTest1  = new Test('Машинка1', 1000);

$array[0] = [$oTest, 2];
$array[1] = [$oTest, 2];
echo "<pre>";
print_r($array);
echo "</pre><hr><br>";
/*array_push($array, $oTest1, 5);*/

$array[] = [0 => $oTest1, 1 => 5];

echo "<pre>";
print_r($array);
echo "</pre><hr><br>";

foreach ($array as $value) {
    echo "<pre>";
    print_r($value);
    echo "</pre>";
    echo $value[0]->price;
}



/*$arrTest = ['test1', 'test2', 'test3'];
echo "<pre>";
print_r($arrTest);
echo "</pre>";

$arrTest = array_push($arrTest, 'test4');

echo "<pre>";
print_r($arrTest);
echo "</pre>";*/