<?php
/**
 * This file contains all the routes for the project
 */

use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::get('/', 'HomeController@index');

SimpleRouter::get('/home', 'HomeController@home');
 
SimpleRouter::get('/group', "GroupController@index");
 
SimpleRouter::get('/login', "LoginController@index");

SimpleRouter::post('/login', "LoginController@login");

SimpleRouter::get('/logout', 'LogoutController@logout');

SimpleRouter::start();
