<?php
/**
 * Created by PhpStorm.
 * User: makhmudov
 * Date: 11.10.2017
 * Time: 20:47
 */

namespace System\Module\DataBase;
/**
 * Trait ActiveRecord
 * @package System\Module\DataBase
 * управление данными сущности (сохранение в бд, обновление в бд и тд)
 */
trait ActiveRecord
{

    protected $db;

    protected $queryBuilder;

    public function __construct($id = 0)
    {
        global $di;

        $this->db           = $di->get('db');
        $this->queryBuilder = new QueryBuilder();

        if ($id) {
            $this->setId($id);
        }
    }


    public function getTable()
    {
        return $this->table;
    }

    //ищем сущность по его id
    public function findOne()
    {
        $find = $this->db->query(
            $this->queryBuilder
                ->select()
                ->from($this->getTable())
                ->where('id', $this->id)
                ->sql(),
            $this->queryBuilder->values
        );

        return isset($find[0]) ? $find[0] : null;
    }

    //сохраняем поля сущности в базу данных
    public function save() {
        $properties = $this->getIssetProperties();

        try {
            if (isset($this->id)) {
                $this->db->execute(
                    $this->queryBuilder->update($this->getTable())
                        ->set($properties)
                        ->where('id', $this->id)
                        ->sql(),
                    $this->queryBuilder->values
                );
            } else {
                $this->db->execute(
                    $this->queryBuilder->insert($this->getTable())
                        ->set($properties)
                        ->sql(),
                    $this->queryBuilder->values
                );
            }

            return;
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //возвращаем поле сущности если оно существует
    private function getIssetProperties()
    {
        $properties = [];

        foreach ($this->getProperties() as $key => $property) {
            if (isset($this->{$property->getName()})) {
                $properties[$property->getName()] = $this->{$property->getName()};
            }
        }

        return $properties;
    }

    //получаем все пуличные поля у сущности
    private function getProperties()
    {
        $reflection = new \ReflectionClass($this);
        $properties = $reflection->getProperties(\ReflectionProperty::IS_PUBLIC);

        return $properties;
    }
}