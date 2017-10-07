<?php
namespace System\Service\Template;

use System\Service\AbstractProvider;
use System\Module\Template\View;

class Provider extends AbstractProvider
{
    public $serviceName = 'view';

    /**
     * @return mixed
     */
    public function init()
    {
        $view = new View();

        $this->di->set($this->serviceName, $view);
    }
}