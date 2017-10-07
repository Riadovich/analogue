<?php
/**
 * Системный класс
 */
namespace System;

use System\Module\Router\DispatchedRoute;
use System\Helper\Common;

class System
{
    public $di;

    public $router;
    
    public function __construct($di)
    {
        $this->di = $di;
        $this->router = $this->di->get("router");
    }

    public function run()
    {
        //TODO run the system
        //подключаем файл добавление роутов
        try {
            require_once __DIR__ . "/../" . mb_strtolower(ENV) . "/Route.php";/*Переделать в дальнейшем*/

            //получаем конртоллер относительно текущего роута
            $routeDispatch = $this->router->dispatch(Common::getMethod(), Common::getUri());

            //если контроллера не найдено то создаем контроллер 404
            if ($routeDispatch == null) {
                $routeDispatch = new DispatchedRoute("ErrorController:page404");
            }

            //делим контроллер и метод(action)
            list($class, $method) = explode(":", $routeDispatch->getController(), 2);

            $controller = "\\" . ENV . "\\Controller\\" . $class;//получаем namespace
            $params = $routeDispatch->getParameters();

            //создаем объект контроллера передаем ему объект с содержащемся в нем модулями и вызываем метод, передаем сл аргументом параметры
            call_user_func_array([new $controller($this->di), $method], $params);
        }
        catch (\Exception $e){
            $e->getMessage();
        }
    }
}