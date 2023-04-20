<?php
session_start();

require_once('../../vendor/autoload.php');
require_once('../views/login.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include_once '../controllers/LoginController.php';
    $controller = new LoginController();
    $controller->login();
}