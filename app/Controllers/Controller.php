<?php

class Controller
{
	public function index()
	{
		require 'app/Views/welcome.view.php';
	}

	public function order(){
		require 'app/Views/order.view.php';
	}

	public function orderNr(){
		require 'app/Views/orderNr.view.php';
	}

	public function overview(){
		require 'app/Views/overview.view.php';
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

