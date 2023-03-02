<?php 
class IngredientController {
    public function index(){
        $breadArray= getAll('SELECT * FROM bread ORDER BY label ASC');
		$cheeseArray = getAll('SELECT * FROM cheese ORDER BY label ASC');
		$meatArray = getAll('SELECT * FROM meat ORDER BY label ASC');
		$sauceArray = getAll('SELECT * FROM sauce ORDER BY label ASC');
		$vegetablesArray = getAll('SELECT * FROM vegetables ORDER BY label ASC');


		require 'app/Views/ingredient.view.php';
	}
}