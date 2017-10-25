<?php
/**
 * Класс для выборки из БД
 * Манипулирует сущностью
 */

namespace Admin\Model\User;

use System\Model;

class UserRepository extends Model
{
    public function getAllUser()
    {
        $sql = $this->queryBuilder->select()
            ->from('user')
            ->orderBy('id', 'DESC')
            ->sql();

        return $this->db->query($sql);
    }

    public function getAdmin($params)
    {
         $sql = $this->queryBuilder
            ->select()
            ->from("`user`")
            ->where('`email`', $params['email'])
            ->where('`password`', $params['password'])
            ->sql();

         $admin = $this->db->query($sql, $this->queryBuilder->values);

         return $admin;
    }
}