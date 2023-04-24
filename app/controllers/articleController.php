<?php


define('__ROOT__', dirname(dirname(__FILE__)));
// require_once(__ROOT__ . '/config.php');
require_once(__ROOT__ . "/models/MySQLHandler.php");


function index()
{
    $MySQLHandler = new MySQLHandler("articles");

    $MySQLHandler->connect();
    $res = $MySQLHandler->get_all_records_paginated();
    // echo ("All Product data " . json_encode($res));
    return $res;
}

function create()
{
    $MySQLHandler = new MySQLHandler("articles");
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $MySQLHandler->connect();
        $_POST["publish_date"] = date('Y-m-d');
        // $_POST["user_id"] = $_SESSION['user_id'];
        $_POST["user_id"] = 1;

        $ext = substr(strrchr($_FILES['image']['name'], '.'), 1);;
        $new_file_name = date('Y_m_d_H_i_s'). '.' .$ext;
        $target = __DIR__.'/../public/images/articles/';
        move_uploaded_file($_FILES['image']['tmp_name'], $target.$new_file_name);

        $_POST["image"] = $new_file_name;
        $MySQLHandler->save($_POST);
    }
}

function returnRes(array $data, $statusCode)
{
    header('Content-Type: application/json');
    http_response_code($statusCode);
}
