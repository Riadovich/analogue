<?php
/**
 * Начальная загрузка
 * инициализатор
 */

require_once __DIR__."/../vendor/autoload.php";

try{
    //объект
    $di = new \System\DI\DI();

    $services = require_once __DIR__."/Include/service.php";

    foreach ($services as $service){
        $serv = new $service($di);
        $serv->init();
    }

    $di->set("model", []);

    $system = new \System\System($di);
    $system->run();
}
catch (\Exception $ex){

}

