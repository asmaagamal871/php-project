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
SimpleRouter::delete('/groups/{id}', 'GroupController@delete');

SimpleRouter::start();
