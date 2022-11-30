<?php
require 'core/bootstrap.php';

$routes = [
	'' => 'Controller@index',
	'home' => 'Controller@index',
	'orders' => 'Controller@order',
	'orderNr' => 'Controller@orderNr',
	'login' => 'Controller@login',
	'test' => 'Controller@test',
	'add_order' => 'Controller@add_order',
	'ingredient' => 'Controller@ingredient',
	'overview' => 'Controller@overview', 
];

$router = new Router($routes);
$router->run($_GET['url'] ?? '');