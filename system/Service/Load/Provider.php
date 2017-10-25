<?php
/**
 * Created by PhpStorm.
 * User: makhmudov
 * Date: 11.10.2017
 * Time: 21:11
 */

namespace System\Service\Load;

use System\Load;

class Provider extends \System\Service\AbstractProvider
{

    public $serviceName = "load";

    public function init()
    {
        $load = new Load($this->di);

        $this->di->set($this->serviceName, $load);

        return $this;
    }
}