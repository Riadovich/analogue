<?php
namespace System\Service\Router;

use System\Service\AbstractProvider;
use System\Module\Router\Router;
//use System\Config\Config;

class Provider extends AbstractProvider
{
    public $serviceName = 'router';

    /**
     * @return mixed
     */
    public function init()
    {
        $router = new Router("http://analogue/");

        $this->di->set($this->serviceName, $router);
    }
}