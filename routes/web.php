<?php
/**
 * This file contains all the routes for the project
 */

use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::get('/', 'HomeController@index');
 
SimpleRouter::get('/group', "GroupController@index");
 
SimpleRouter::start();
