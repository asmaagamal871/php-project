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

    public function create()
    {

        include __DIR__ . '/../views/users/create.php';
    }

    public function store()
    {
        $user = new User;
        $create = $user->create();
        if ($create) {
            header("Location: /users");
            exit;
        } else {
            include __DIR__ . '/../views/users/create.php';
        }
    }

    public function edit($id)
    {
        $user = new User;
        $result = $user->getByID($id);
        include __DIR__ . '/../views/users/edit.php';
    }

    public function update($id)
    {
        $user = new User;
        $update = $user->update($id);
        if ($update) {
            header("Location: /users");
            exit;
        } else {
            include __DIR__ . '/../views/users/edit.php';
        }
    }

    public function destroy($id)
    {
        $user = new User;
        $delete = $user->delete($id);
        if ($delete) {
            header("Location: /users");
            exit;
        } else {
            //include __DIR__ . '/../views/groups/create.php';
        }
    }
}
