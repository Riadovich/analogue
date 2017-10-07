<?php

namespace System\Module\DataBase;

use \PDO;


class Connection
{

    //дескриптор
    public $link;

    public function __construct()
    {
        $this->connect();
    }

    //Подключение к бд
    public function connect()
    {
        $config = require_once $_SERVER["DOCUMENT_ROOT"]."/admin/Config/database.php";

        $dsn = 'mysql:host=' .$config['host'] .';dbname=' .$config['db_name'] .';charset=' .$config['charset'];

        $this->link = new PDO($dsn, $config['username'], $config['password']);

        return $this;
    }

    //запрос к бд с предварительной подготовкой
    public function execute($sql, $values = [])
    {
        $sth = $this->link->prepare($sql);

        return $sth->execute($values);
    }

    //запрос к бд
    public function query($sql, $values = [], $statement = PDO::FETCH_OBJ)
    {
        $sth = $this->link->prepare($sql);

        $sth->execute($values);

        $result = $sth->fetchAll($statement);

        if($result === false){
            return [];
        }

        return $result;
    }

}