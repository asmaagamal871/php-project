<?php

require_once('../models/MySQLHandler.php');
require_once('../controllers/BaseController.php');

class LoginController extends BaseController
{
    public function login()
    {
        $db = new MySQLHandler("users");

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            if ($db->authenticate($email, $password)) {
                $_SESSION['logged_in'] = true;
                if ($this->isAdmin()) {
                    die("this is an admin!");
                }
                if ($this->isEditor()) {
                    die("this is an editor!");
                }
                //  // die("welcome!");
                // header('Location: /php-project/app/views/index.php');
                //  // include '../views/home.php';
                //  // exit;
            } else {
                die("invalid email or password");
            }
        }

        // Display the login form
        include '../views/login.php';
    }
}
