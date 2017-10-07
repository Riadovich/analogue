<?php
/**
 * Created by PhpStorm.
 * User: makhmudov
 * Date: 07.10.2017
 * Time: 16:56
 */

namespace System\Module\Request;

/**
 * Class Request
 * @package System\Module\Request
 * Хранит данные запроса (GET POST и тд)
 */
class Request
{
    public $get;

    public $post;

    public $request;

    public $cookie;

    public $files;

    public $server;

    public function __construct()
    {
        $this->get     = $_GET;
        $this->post    = $_POST;
        $this->request = $_REQUEST;
        $this->cookie  = $_COOKIE;
        $this->files   = $_FILES;
        $this->server  = $_SERVER;
    }


}