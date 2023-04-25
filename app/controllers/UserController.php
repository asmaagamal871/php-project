<?php

// if (!defined('__ROOT__'))
//     define('__ROOT__', dirname(dirname(__FILE__)));
// require_once(__ROOT__ . "/models/MySQLHandler.php");
// require_once(__ROOT__ . "/models/User.php");
require_once(__DIR__ . '/../models/User.php');

class UserController
{
    public function index()
    {
        $user = new User;
        $users = $user->getUsers();
        include __DIR__ . '/../views/users/index.php';
    }
}
