<?php

class HomeController
{
	public function index()
	{
		require 'app/Views/welcome.view.php';
	}

	public function login(){
		$errors = [];
		require 'app/Views/login.view.php';
	}

	public function credential($id, $password) {
        $staff = getAll("SELECT * FROM staff WHERE pk_staffId = ?", array($id));
		
        $result = $staff[0];
        if ($result) {
            if ($password == $result->password) {
                return $id;
            }
        }
        return false;
    }
	
	public function loginControl(){
		$errors = [];

		if ($_POST['pk_staffId'] == "") array_push($errors, "Bitte eine ID angeben");
		if ($_POST['password'] == "") array_push($errors, "Bitte ein Passwort angeben");
		
		if ($errors == []) {
			$staffId = $this->credential($_POST['pk_staffId'], $_POST['password']);
			if ($staffId) {
				// login succeeded -> go to overview if staff; go to ingredients if admin
				if ($staffId == 1) header('location: ' . dirname($_SERVER['SCRIPT_NAME']) . '/ingredient');
				else header('location: ' . dirname($_SERVER['SCRIPT_NAME']) . '/overview');
			}
		}
		require 'app/Views/login.view.php';
	}


}

