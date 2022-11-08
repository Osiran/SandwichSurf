<?php
require 'core/bootstrap.php';

$routes = [
	'home' => 'WelcomeController@index',
	'bestellen' => 'WelcomeController@bestellen',
];

$router = new Router($routes);
$router->run($_GET['url'] ?? '');