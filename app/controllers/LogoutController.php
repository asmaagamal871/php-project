<?php

require_once(__DIR__.'/../models/MySQLHandler.php');
require_once(__DIR__.'/../controllers/BaseController.php');

class LogoutController extends BaseController
{
    public function logout()
    {
        session_destroy();
        header('Location: /login');
        exit;
    }
}
