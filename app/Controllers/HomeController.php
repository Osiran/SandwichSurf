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

        // Guard the empty result set: an unknown id used to hit an undefined
        // offset ($staff[0]) and emit a warning before failing.
        $result = $staff[0] ?? null;
        if ($result) {
            if ($password == $result->password) {
                return $id;
            }
        }
        return false;
    }

	public function loginControl(){
		$errors = [];

		if (post('pk_staffId') === "") array_push($errors, "Bitte eine ID angeben");
		if (post('password') === "") array_push($errors, "Bitte ein Passwort angeben");

		if ($errors == []) {
			$staffId = $this->credential(post('pk_staffId'), post('password'));
			if ($staffId) {
				// login succeeded -> go to overview if staff; go to ingredients if admin.
				// exit() after the redirect so we don't also render the login view
				// into the redirected response body.
				if ($staffId == 1) header('location: ' . dirname($_SERVER['SCRIPT_NAME']) . '/ingredient');
				else header('location: ' . dirname($_SERVER['SCRIPT_NAME']) . '/overview');
				exit;
			}
			// Wrong id/password combination: previously the form re-rendered with no
			// feedback at all. Surface a clear error instead.
			array_push($errors, "ID oder Passwort ist ungültig");
		}
		require 'app/Views/login.view.php';
	}


}

