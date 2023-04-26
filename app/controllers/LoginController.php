<?php

require_once(__DIR__ . '/../models/MySQLHandler.php');
require_once(__DIR__ . '/../controllers/BaseController.php');

class LoginController extends BaseController
{
    public function index()
    {
        if (isset($_SESSION['user_id'])) {

            // Redirect the user to the login page
            header('Location: /home');
            exit;
        } else
            include __DIR__ . '/../views/login.php';
        } else {
            include __DIR__ .'/../views/login.php';
        }
    }

    public function login()
    {
        $db = new MySQLHandler("users");

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            if ($db->authenticate($email, $password)) {
                $_SESSION['logged_in'] = true;
                $_SESSION['last_login'] = date('Y-m-d H:i:s');
                $data = array(
                    "last_login" => $_SESSION['last_login']
                           );
                $db->update($data,$_SESSION['user_id']);
                header('Location: /');
                exit;
            } else {
                $_SESSION['error'] = "Invalid email or password!";
                header('Location: /login');
                exit;
            }
        }

        // Display the login form
        include '../views/login.php';
    }
}
