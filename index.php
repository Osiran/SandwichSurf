<?php
require 'core/bootstrap.php';

$routes = [
	'' => 'Controller@index',
	'home' => 'Controller@index',
	'orders' => 'Controller@order',
	'orderNr' => 'Controller@orderNr',
	'login' => 'Controller@login',
	'test' => 'Controller@test',
];

$router = new Router($routes);
$router->run($_GET['url'] ?? '');