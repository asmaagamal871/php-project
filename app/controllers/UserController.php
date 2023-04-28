<?php

require_once(__DIR__ . '/../models/User.php');
require_once(__DIR__ . '/../controllers/BaseController.php');

class UserController extends BaseController
{
    public function index()
    {
        $user = new User();
        $users = $user->getUsers();
        include __DIR__ . '/../views/users/index.php';
    }

    public function show($id)
    {
        $user = new User();
        $result = $user->getByID($id);
        include __DIR__ . '/../views/users/show.php';
    }

    public function create()
    {
        if ($this->isAdmin()) {

            include __DIR__ . '/../views/users/create.php';
        } else {
            $_SESSION['error'] = "Sorry, you are not an admin";
            header("Location: /users");
        }
    }

    public function store()
    {
        $check = $this->isAdmin();
        if ($check) {
            $user = new User();
            $create = $user->create();
            if ($create) {
                header("Location: /users");
                exit;
            } else {
                $_SESSION['error'] = "Failed to Create";
                include __DIR__ . '/../views/users/create.php';
            }
        } else {
            $_SESSION['error'] = "Sorry, you are not an admin";
            header("Location: /userss");
        }
    }

    public function edit($id)
    {
        $check = $this->isAdmin();
        if ($check) {
            $user = new User();
            $result = $user->getByID($id);
            include __DIR__ . '/../views/users/edit.php';
        } else {
            $_SESSION['error'] = "Sorry, you are not an admin";
            header("Location: /users");
        }
    }

    public function update($id)
    {
        $check = $this->isAdmin();
        if ($check) {
            $user = new User();
            $update = $user->update($id);
            if ($update) {
                header("Location: /users");
                exit;
            } else {
                $_SESSION['error'] = "Failed to Update";
                include __DIR__ . '/../views/users/edit.php';
            }
        } else {
            $_SESSION['error'] = "Sorry, you are not an admin";
            header("Location: /users");
        }
    }

    public function destroy($id)
    {
        $check = $this->isAdmin();
        if ($check) {
            $user = new User();
            $delete = $user->delete($id);
            if ($delete) {
                header("Location: /users");
                exit;
            } else {
                $_SESSION['error'] = "Failed to delete";
                header("Location: /users");
            }
        } else {
            $_SESSION['error'] = "Sorry, you are not an admin";
            header("Location: /users");
        }
    }

    public function restore($id)
    {
        $check = $this->isAdmin();
        if ($check) {
            $user = new User();
            $restore = $user->restore($id);
            if ($restore) {
                header("Location: /users");
                exit;
            } else {
                $_SESSION['error'] = "Failed to restore";
                header("Location: /users");
            }
        } else {
            $_SESSION['error'] = "Sorry, you are not an admin";
            header("Location: /users");
        }
    }

    public function show_users_group($id)
    {
        $user = new User();
        $users = $user->getByGroupID($id);
        include __DIR__ . '/../views/users/showgroup.php';
    }
}
