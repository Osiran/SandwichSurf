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

	public function login(){
		require 'app/Views/login.view.php';
	}

	public function loginControl(){
		$errors = [];

		if ($_POST['pk_staffId'] == "") array_push($errors, "Bitte eine ID angeben");
		if ($_POST['password'] == "") array_push($errors, "Bitte ein Passwort angeben");
		

		if ($errors == []) {
			require 'app/Models/Staff.php';
			$staff = new Staff();
			if ($staff->login($_POST['pk_staffId'], $_POST['password'])) {
				// login succeeded -> go to overview if staff; go to ingredients if admin
			}
		}

		require 'app/Controllers/inc/loginControl.inc.php';
	}

	public function test(){
		// $pdo = connectDatabase();
        // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		// $Colley = new ColleyLogin();

		// $code = $Colley -> CheckEnteredCode();
		// $code = $code->fetchAll();

		require 'app/Views/test.php';
	}

	public function add_order(){
		$pdo = connectDatabase();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$Order = Order::create($_POST['bread'], $_POST['cheese'], $_POST['meat'], $_POST['sauce'], $_POST['vegetables']);
	}
}

