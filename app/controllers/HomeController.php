<?php

class HomeController
{
    public function home()
    {
        require_once  __DIR__.'/../views/home.php';
    }

    public function error()
    {
        require_once  __DIR__.'/../views/error.php';
    }
}
