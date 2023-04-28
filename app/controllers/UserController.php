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
    { //^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$
        $check = $this->isAdmin();
        $email = $_POST['email'];
        $pattern_email = '/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
        $phone = $_POST['phone'];
        $pattern_phone = '/[0-9]{7,}/';
        $username = $_POST['username'];
        $pattern_username = '/[a-zA-Z0-9]+/';
        $name = $_POST['name'];
        $pattern_name = '/[a-zA-Z\s]+/';
        $password = $_POST['password'];
        $pattern_password = '/[a-zA-Z0-9]{8,}$/';


        if (!preg_match($pattern_email, $email)) {
            $_SESSION['error'] = "please enter a valid email format.";
            header("Location: /users/create");
            exit();
        }
        if (!preg_match($pattern_phone, $phone)) {
            $_SESSION['error'] = "phone number must be at least 7 digits and doesn't contain letters.";
            header("Location: /users/create");
            exit();
        }
        if (!preg_match($pattern_username, $username)) {
            $_SESSION['error'] = "username must be contain only letters and numbers.";
            header("Location: /users/create");
            exit();
        }
        if (!preg_match($pattern_name, $name)) {
            $_SESSION['error'] = "name must be contain only letters .";
            header("Location: /users/create");
            exit();
        }
        if (!preg_match($pattern_password, $password)) {
            $_SESSION['error'] = "password must be contain at least 8 letters .";
            header("Location: /users/create");
            exit();
        }

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
        $email = $_POST['email'];
        $pattern_email = '/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
        $phone = $_POST['phone'];
        $pattern_phone = '/[0-9]{7,}/';

        if (!preg_match($pattern_email, $email)) {
            $_SESSION['error'] = "please enter a valid email format.";
            header("Location: /users/create");
            exit();
        }
        if (!preg_match($pattern_phone, $phone)) {
            $_SESSION['error'] = "phone number must be at least 7 digits and doesn't contain letters.";
            header("Location: /users/create");
            exit();
        }
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
