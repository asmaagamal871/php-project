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
SimpleRouter::get('/groups/{id}/restore', 'GroupController@restore');
SimpleRouter::put('/groups/{id}', 'GroupController@update');
SimpleRouter::delete('/groups/{id}', 'GroupController@destroy');

//Users

SimpleRouter::get('/users', 'UserController@index');
SimpleRouter::get('/users/create', 'UserController@create');
SimpleRouter::post('/users', 'UserController@store');
SimpleRouter::get('/users/{id}', 'UserController@show');
SimpleRouter::get('/users/{id}/edit', 'UserController@edit');
SimpleRouter::get('/users/{id}/restore', 'UserController@restore');

SimpleRouter::put('/users/{id}', 'UserController@update');
SimpleRouter::delete('/users/{id}', 'UserController@destroy');


SimpleRouter::get('/articles', 'ArticleController@index');
SimpleRouter::get('/articles/create', 'ArticleController@create');
SimpleRouter::post('/articles', 'ArticleController@store');
SimpleRouter::get('/articles/{id}', 'ArticleController@show');
SimpleRouter::get('/articles/{id}/restore', 'ArticleController@restore');
SimpleRouter::delete('/articles/{id}', 'ArticleController@destroy');


SimpleRouter::start();
