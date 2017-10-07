<?php
/**
 * Created by PhpStorm.
 * User: makhmudov
 * Date: 02.10.2017
 * Time: 22:55
 */

namespace System;

/**
 * Class Controller
 * @package System
 * Абстрактный контроллер
 */
abstract class Controller
{
    protected $di;

    protected $db;

    protected $view;

    protected $request;

    public function __construct($di)
    {
        $this->di      = $di;
        $this->db      = $this->di->get("db");
        $this->view    = $this->di->get("view");
        $this->request = $this->di->get("request");
    }
}