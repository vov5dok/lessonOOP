<?php

class User
{
    // Создаем 5 свойств: ФИО, почта, пол, возраст, телефон
    private $fio;
    private $email;
    private $gender;
    private $age;
    private $phone;

    public function __construct($fio, $email, $gender = '', $age = '', $phone = '')
    {
        $this->fio = $fio;
        $this->email = $email;
        $this->gender = $gender;
        $this->age = $age;
        $this->phone = $phone;
    }

    // Выводим инициализированные свойства
    public function outputUser()
    {
        echo "ФИО: $this->fio <br>" . PHP_EOL;
        echo "E-mail: $this->email <br>" . PHP_EOL;
        echo "Пол: $this->gender <br>" . PHP_EOL;
        echo "Возраст: $this->age <br>" . PHP_EOL;
        echo "Телефон: $this->phone <br>" . PHP_EOL;
    }

    public function notify($message)
    {
        if ($this->age < 18) {
            $message = $this->censor($message);
        }
        $mess = '';
        if (empty($this->phone)) {            
            $mess .= $this->notifyOnEmail($message);
        } else {
            $mess .= $this->notifyOnPhone($message);
        }
        return $mess;
    }

    //Создаем уведомление клиенту
    private function send($message, $check = 'email')
    {
        $mess = "Уведомление клиенту: $this->fio на e-mail ($this->email): $message<br>";
        if ($check == 'phone') {
            $mess .= "Уведомление клиенту: $this->fio на Телефон ($this->phone): $message<br>";
        }
        return $mess;
    }    

    private function notifyOnEmail($message)
    {
        echo $this->send($message);
    }

    private function notifyOnPhone($message)
    {
        echo $this->send($message, 'phone');
    }

    // Заменяем в уведомлении все гласные буквы на символ "*"
    private function censor($message)
    {
        return preg_replace("/[aeiouAEIOU]/", "*", $message);
    }
}


if(parse_url($_SERVER['REQUEST_URI']) === basename(__FILE__)){
    $user = new User('Иванов Иван Иваныч', 'ivanych@mail.ru', 'man', '25', '89275007080');
    $user->notify('Your parcel has been delivered');
    echo "<hr>";

    $user1 = new User('Петров Петя Петрович', 'petrovych@mail.ru', 'man', '10');
    $user1->notify('Hello, world!!!');
    echo "<hr>";

    $user2 = new User('Селезнева Елена Викторовна', 'selezneva@mail.ru', 'woman', '28', '89357008899');
    $user2->notify('You made a purchase');
}
