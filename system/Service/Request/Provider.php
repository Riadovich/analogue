<?php
/**
 * Created by PhpStorm.
 * User: makhmudov
 * Date: 07.10.2017
 * Time: 17:08
 */

namespace System\Service\Request;

class Provider extends \System\Service\AbstractProvider
{

    public $serviceName = "request";

    public function init()
    {
        $request = new \System\Module\Request\Request();
        $this->di->set($this->serviceName, $request);
    }
}