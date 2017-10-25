<?php
/**
 * Created by PhpStorm.
 * User: makhmudov
 * Date: 11.10.2017
 * Time: 20:34
 */

namespace System;

use \System\Module\DataBase\QueryBuilder;

abstract class Model
{

    public $di;

    public $db;

    public $queryBuilder;

    public function __construct($di)
    {
        $this->di           = $di;
        $this->db           = $this->di->get("db");
        $this->queryBuilder = new QueryBuilder();

    }

}