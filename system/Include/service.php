<?php
//массив подключаемых модулей
return [
    \System\Service\Router\Provider::class,
    \System\Service\Database\Provider::class,
    \System\Service\Request\Provider::class,
    \System\Service\Template\Provider::class,
    \System\Service\Auth\Provider::class
];