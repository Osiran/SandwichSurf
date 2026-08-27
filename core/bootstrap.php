<?php
// Sessions back the staff login (see core/helpers.php auth guards).
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require 'core/helpers.php';
require 'core/Router.php';
require 'core/database.php';
