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
		// $pdo = connectDatabase();
        // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		// $Colley = new ColleyLogin();

		// $code = $Colley -> CheckEnteredCode();
		// $code = $code->fetchAll();

		require 'app/Views/test.php';
	}
}

