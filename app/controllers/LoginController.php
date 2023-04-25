<?php

require_once(__DIR__.'/../models/MySQLHandler.php');
require_once(__DIR__.'/../controllers/BaseController.php');

class LoginController extends BaseController
{
    public function index()
    {
        if (isset($_SESSION['user_id'])) {

            // Redirect the user to the login page
            header('Location: /home');
            exit;
        }    else    include __DIR__ .'/../views/login.php';
    }

    public function login()
    {
        $db = new MySQLHandler("users");

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            if ($db->authenticate($email, $password)) {
                $_SESSION['logged_in'] = true;
                // if ($this->isAdmin()) {
                //     die("this is an admin!");
                // }
                // if ($this->isEditor()) {
                //     die("this is an editor!");
                // }
                //  // die("welcome!");
                // header('Location: /php-project/app/views/index.php');
                //  // include '../views/home.php';
                //  // exit;

                header('Location: /');
                exit;

            } else {
                die("invalid email or password");
            }
        }

        // Display the login form
        include '../views/login.php';
    }
}
