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

SimpleRouter::get('/articles', 'ArticleController@index');
SimpleRouter::get('/articles/create', 'ArticleController@create');
SimpleRouter::post('/articles', 'ArticleController@store');
SimpleRouter::get('/articles/{id}', 'ArticleController@show');
SimpleRouter::delete('/articles/{id}', 'ArticleController@destroy');


SimpleRouter::start();
