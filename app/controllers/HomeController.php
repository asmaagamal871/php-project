<?php

class HomeController
{
    public function index()
    {
        include  'index.php';
    }
    
    public function home()
    {
        include  __DIR__.'/../views/home.php';
    }

}
