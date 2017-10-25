<?php
namespace Admin\Controller;


use System\Controller;
use System\Helper\Redirect;
use System\Helper\Session;
use System\Module\DataBase\QueryBuilder;

class LoginController extends Controller
{
    public function __construct($di)
    {
        parent::__construct($di);

        if($this->auth->autorized()){
            Redirect::redirect("/admin/");
        }
    }

    public function form()
    {
        $this->view->render("login");
    }

    //авторизация
    public function auth()
    {
        $query = $this->load->model("User")->repository->getAdmin($_POST);

        if (!empty($query)) {
            $user = $query[0];

            if ($user->role == 'admin') {

                $this->auth->autorize();
                Redirect::redirect("/admin/login");
            }
        }

        echo 'Incorrect email or password.';
    }


}