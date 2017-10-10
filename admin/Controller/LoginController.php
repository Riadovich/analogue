<?php
namespace Admin\Controller;


use System\Controller;
use System\Helper\Redirect;
use System\Helper\Session;

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

    public function auth()
    {
        $email    = $this->request->post['email'];
        $password = $this->request->post['password'];

        if($email == "admin@mail.ru" && $password == "123"){
            $this->auth->autorize();
            Redirect::redirect("/admin/");
        }
    }


}