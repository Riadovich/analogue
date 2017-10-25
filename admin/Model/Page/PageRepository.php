<?php
/**
 * Created by PhpStorm.
 * User: makhmudov
 * Date: 14.10.2017
 * Time: 20:55
 */

namespace Admin\Model\Page;

use System\Model;

class PageRepository extends Model
{

    public function getAllPage()
    {
        $sql = $this->queryBuilder
            ->select()
            ->from("page")
            ->orderBy('id', 'DESC')
            ->sql();
//        echo $sql;
        return $this->db->query($sql);
//        return [['id' => 1, 'title' => "test", "date" => "test"]];
    }

    public function createPage($params)
    {
        $page = new Page();
        $page->setTitle($params["title"]);
        $page->setContent($params['content']);
        $page->save();
    }

}