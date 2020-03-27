<?php

class BlackBox
{
    private $data;

    public function addLog($message)
    {
        // добавляет очередную строку в свое свойство $data;
        $this->data = $message;
    }

    public function getDataByEngineer(Engineer $engineer)
    {
        // возвращает свои данные для инженера
        $engineer->setBox(new BlackBox());
    }

}

class Plane
{
    private $blackBox;

    public function __construct(BlackBox $blackBox)
    {
        $this->blackBox = $blackBox;
    }

    public function flyAndCrush()
    {
        $this->flyProcess();
        $this->crushProcess();

        /*где flyProcess — процесс полета может иначе проходить для других самолетов, пишет лог в черный ящик, придумайте что будет записано в этом методе в черный ящик, а crushProcess — процесс крушения переопределен быть не может, пишет лог в черный ящик. Нужно придумать, что будет записано в этом методе в черный ящик*/
    }

    protected function addLog($message)
    {
        //передает сообщение для записи в лог черного ящика
        $this->blackBox = $message;
    }

    public function getBoxForEngineer(Engineer $engineer)
    {
        $engineer->setBox($this->blackBox);
    }

    private function flyProcess()
    {
        $this->addLog("Полет произошел успешно");
    }

    private function crushProcess()
    {
        $this->addLog("Произошло крушение самолета");
    }

}

class Engineer
{
    public function setBox(BlackBox $blackBox)
    {
        //  устанавливает черный ящик для дешифрации у инженера

    }

    public function takeBox(Plane $plane)
    {
        // должен доставать черный ящик из самолета (нужно посмотреть, какой подходящий метод есть в классе Plane)
        $plane->getBoxForEngineer(new Engineer());
    }

    public function decodeBox()
    {
        // декодирует черный ящик — выводит на экран лог черного ящика
        echo $this->takeBox(new Plane(new BlackBox()));
    }

}

$plane = new Plane(new BlackBox());

$engineer = new Engineer();
$engineer->decodeBox();
