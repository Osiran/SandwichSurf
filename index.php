<?php
require 'core/bootstrap.php';

$routes = [
	'' => 'HomeController@index',
	'home' => 'HomeController@index',
	'login' => 'HomeController@login',
	'loginControl' => 'HomeController@loginControl',
	'logout' => 'HomeController@logout',

	'orders' => 'OrderController@createGET',
	'add_order' => 'OrderController@createPOST',
	'orderNr' => 'OrderController@orderNr',
	'track' => 'OrderController@track',
	'overview' => 'OrderController@index',
	'updateStatus' => 'OrderController@updateStatus',

	'ingredient' => 'IngredientController@index',
];

$router = new Router($routes);
$router->run($_GET['url'] ?? '');
