<?php

/**
 * This file contains all the routes for the project
 */

use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::get('/', 'HomeController@home');
SimpleRouter::get('/home', 'HomeController@home');
SimpleRouter::get('/login', "LoginController@index");
SimpleRouter::post('/login', "LoginController@login");
SimpleRouter::get('/logout', 'LogoutController@logout');

//Groups
SimpleRouter::get('/groups', 'GroupController@index');
SimpleRouter::get('/groups/create', 'GroupController@create');
SimpleRouter::post('/groups', 'GroupController@store');
SimpleRouter::get('/groups/{id}', 'GroupController@show');
SimpleRouter::get('/groups/{id}/edit', 'GroupController@edit');
SimpleRouter::put('/groups/{id}', 'GroupController@update');
SimpleRouter::delete('/groups/{id}', 'GroupController@destroy');

//Users
SimpleRouter::get('/users', 'UserController@index');
SimpleRouter::get('/users/create', 'UserController@create');
SimpleRouter::post('/users', 'UserController@store');
SimpleRouter::get('/users/{id}', 'UserController@show');
SimpleRouter::get('/users/{id}/edit', 'UserController@edit');
SimpleRouter::put('/users/{id}', 'UserController@update');
SimpleRouter::delete('/users/{id}', 'UserController@destroy');

SimpleRouter::start();
