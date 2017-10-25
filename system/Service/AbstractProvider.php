<?php

namespace System\Service;


/**
 * Class AbstractProvider
 * @package System\Service
 * Дочерние классы этого класса будут добовлять
 * объекты модулей в объект DI
 * (Добовляет "любые" объекты в объект DI)
 */
abstract class AbstractProvider
{

    //Внедрение зависимостей
    protected $di;

    public function __construct($di)
    {
        $this->di = $di;
    }

    abstract function init();

}