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

	/**
	 * Validate credentials. Returns the staff row on success, false otherwise.
	 *
	 * Passwords are bcrypt-verified. Accounts still holding a legacy plaintext
	 * password keep working: if the hash check fails but the stored value matches
	 * the input verbatim, the login succeeds and the password is transparently
	 * re-hashed so the plaintext is gone after the first login.
	 */
	public function credential($id, $password) {
        $staff = getAll("SELECT * FROM staff WHERE pk_staffId = ?", array($id));
        $result = $staff[0] ?? null;
        if (!$result) {
            return false;
        }

        $stored = (string) $result->password;

        if (password_verify($password, $stored)) {
            return $result;
        }

        // Legacy plaintext fallback + upgrade.
        if ($stored !== '' && hash_equals($stored, (string) $password)) {
            saveData("UPDATE staff SET password = ? WHERE pk_staffId = ?",
                array(password_hash($password, PASSWORD_DEFAULT), $id));
            return $result;
        }

        return false;
    }

	public function loginControl(){
		$errors = [];

		if (post('pk_staffId') === "") array_push($errors, "Bitte eine ID angeben");
		if (post('password') === "") array_push($errors, "Bitte ein Passwort angeben");

		if ($errors == []) {
			$staff = $this->credential(post('pk_staffId'), post('password'));
			if ($staff) {
				// Establish the session (prevents the overview/ingredient pages from
				// being reachable by URL alone) and route by role.
				session_regenerate_id(true);
				$_SESSION['staff_id']   = (int) $staff->pk_staffId;
				$_SESSION['staff_role'] = $staff->userRole;

				if (strtolower((string) $staff->userRole) === 'admin') {
					redirect('ingredient');
				}
				redirect('overview');
			}
			array_push($errors, "ID oder Passwort ist ungültig");
		}
		require 'app/Views/login.view.php';
	}

	public function logout(){
		$_SESSION = [];
		if (ini_get('session.use_cookies')) {
			$p = session_get_cookie_params();
			setcookie(session_name(), '', time() - 42000, $p['path'], $p['domain'], $p['secure'], $p['httponly']);
		}
		session_destroy();
		redirect('login');
	}
}
