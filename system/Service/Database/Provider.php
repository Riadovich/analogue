<?php
namespace System\Service\Database;

use System\Service\AbstractProvider;
use System\Module\DataBase\Connection;

class Provider extends AbstractProvider
{
    public $serviceName = 'db';

    /**
     * @return mixed
     */
    public function init()
    {
        $db = new Connection();

        $this->di->set($this->serviceName, $db);
    }
}