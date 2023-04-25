<?php

require_once(__DIR__ . '/../models/User.php');

class UserController extends BaseController
{
    public function index()
    {
        $user = new User;
        $users = $user->getUsers();
        include __DIR__ . '/../views/users/index.php';
    }

    public function show($id)
    {
        $user = new User;
        $result = $user->getByID($id);
        include __DIR__ . '/../views/users/show.php';
    }
}
