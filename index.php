<?php
require 'core/bootstrap.php';

$routes = [
	'' => 'HomeController@index',
	'home' => 'HomeController@index',
	'login' => 'HomeController@login',
	'loginControl' => 'HomeController@loginControl',

	'orders' => 'OrderController@createGET',
	'add_order' => 'OrderController@createPOST',
	'orderNr' => 'OrderController@orderNr',
	'overview' => 'OrderController@index', 
	
	'ingredient' => 'IngredientController@index',
];

$router = new Router($routes);
$router->run($_GET['url'] ?? '');