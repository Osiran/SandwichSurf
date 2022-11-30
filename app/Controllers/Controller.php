<?php

class Controller
{
	public function index()
	{
		require 'app/Views/welcome.view.php';
	}

	public function order(){
		require 'app/Models/Order.php';

		// $orders = Order::getAll();
		
		

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
			$staffId = $staff->login($_POST['pk_staffId'], $_POST['password']);
			if ($staffId) {
				// login succeeded -> go to overview if staff; go to ingredients if admin
				if ($staffId == 1) header('location: ' . dirname($_SERVER['SCRIPT_NAME']) . 'ingredient');
				else header('location: ' . dirname($_SERVER['SCRIPT_NAME']) . 'overview');
			}
		}
		header('location: ' . dirname($_SERVER['SCRIPT_NAME']) . 'login');
	}

	public function ingredient(){
		require 'app/Models/Bread.php';
		require 'app/Models/Cheese.php';
		require 'app/Models/Meat.php';
		require 'app/Models/Sauce.php';
		require 'app/Models/Vegetables.php';

		$breadArray = Bread::getAll();
		$cheeseArray = Bread::getAll();
		$meatArray = Bread::getAll();
		$sauceArray = Bread::getAll();
		$vegetablesArray = Bread::getAll();

		require 'app/Views/ingridients.view.php';
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
		require 'app/Models/Order.php';

		$pdo = connectDatabase();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		Order::create($_POST['bread'], $_POST['meat'], $_POST['cheese'], $_POST['sauce'], $_POST['vegetables']);
	}

/* Shows all orders currently made */
	public function showAllOrders(){
		require 'app/Models/Order.php';

		$orders = Order::getAll();

		require 'app/Views/order.view.php';
	}
}

