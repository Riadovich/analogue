<?php
/**
 * Created by PhpStorm.
 * User: makhmudov
 * Date: 13.10.2017
 * Time: 23:10
 */

namespace Admin\Controller;


class PageController extends AdminController
{
    public function listing()
    {
        $pages = $this->load->model("Page")->repository->getAllPage();
        $this->view->render("pages/list", ["pages" => $pages]);
    }

    public function create()
    {
        $this->view->render("pages/create");
    }

    public function createPage()
    {
//        print_r($this->request->post);
        $this->load->model("Page")->repository->createPage($this->request->post);
    }
}