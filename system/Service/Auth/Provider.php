<?php

namespace System\Service\Auth;

use System\Module\Auth\Auth;
use System\Service\AbstractProvider;

class Provider extends AbstractProvider
{
    public $serviceName = 'auth';

    public function init()
    {
        $auth = new Auth();
        $this->di->set($this->serviceName, $auth);
    }
}