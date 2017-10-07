<?php

namespace System\DI;

/**
 * Class DI
 * @package System\DI
 *
 */
class DI
{
    public $conteiner = [];

    public function set($key, $obj)
    {
        $this->conteiner[$key] = $obj;
    }

    public function get($key)
    {
        return $this->has($key);
    }

    public function has($key)
    {
        return isset($this->conteiner[$key]) ? $this->conteiner[$key] : null;
    }


}