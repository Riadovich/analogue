<?php
/*
 *  "/" имеет значение
 *  "Ключи не должны совпадать"
 */

$this->router->add("dashboard", "/admin/", "DashboardController:index");
$this->router->add("login", "/admin/login", "LoginController:form");
$this->router->add("auth", "/admin/auth", "LoginController:auth", 'POST');

$this->router->add("logout", "/admin/logout", "AdminController:logout");

$this->router->add("list_page", "/admin/page/list", "PageController:listing");
$this->router->add("create_page", "/admin/page/create", "PageController:create");
$this->router->add("create_page_process", "/admin/page/create/process", "PageController:createPage", "POST");
