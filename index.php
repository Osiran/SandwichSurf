<?php
require 'core/bootstrap.php';

$routes = [
	'' => 'Controller@index',
	'home' => 'Controller@index',
	'orders' => 'Controller@order',
	'test' => 'Controller@test',
];

$router = new Router($routes);
$router->run($_GET['url'] ?? '');