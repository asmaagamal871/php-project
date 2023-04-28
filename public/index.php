<?php
session_start();

// load composer dependencies
require_once(__DIR__ .'/../vendor/autoload.php');

// Load our custom routes
require_once '../routes/web.php';

// if (!isset($_SESSION['user_id'])) {

//     // Redirect the user to the login page
// header('Location: /login');
//     exit;
// }else{
//     header('Location: /home');
// }
