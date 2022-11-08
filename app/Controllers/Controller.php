<?php

class Controller
{
	public function index()
	{
		require 'app/Views/welcome.view.php';
	}

	public function bestellen(){
		require 'app/Views/bestellen.view.php';
	}

	public function test(){
		require 'app/Views/test.php';
	}
}

