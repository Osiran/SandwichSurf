<?php
require 'core/bootstrap.php';

$routes = [
	'home' => 'Controller@index',
	'bestellen' => 'Controller@bestellen',
	'test' => 'Controller@test',
];

$router = new Router($routes);
$router->run($_GET['url'] ?? '');