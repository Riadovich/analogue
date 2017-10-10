<?php
/*
 *  "/" имеет значение
 *  "Ключи не должны совпадать"
 */

$this->router->add("dashboard", "/admin/", "DashboardController:index");
$this->router->add("login", "/admin/login", "LoginController:form");
$this->router->add("auth", "/admin/auth", "LoginController:auth", 'POST');
