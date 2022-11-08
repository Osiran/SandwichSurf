<?php

class WelcomeController
{
	public function index()
	{
		$hello = 'Viel Spass beim Programmieren!';
		
		require 'app/Views/welcome.view.php';
	}

	public function bestellen(){
		require 'app/Views/bestellen.view.php';
	}
}

