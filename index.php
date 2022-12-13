<?php
require 'core/bootstrap.php';

$routes = [
	'' => 'Controller@index',
	'home' => 'Controller@index',
	'orders' => 'Controller@order',
	'add_order' => 'Controller@add_order',
	'orderNr' => 'Controller@orderNr',
	'login' => 'Controller@login',
	'loginControl' => 'Controller@loginControl',
	'ingredient' => 'Controller@ingredient',
	'overview' => 'Controller@overview', 
];

$router = new Router($routes);
$router->run($_GET['url'] ?? '');