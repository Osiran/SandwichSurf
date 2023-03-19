<?php 
class IngredientController {
    public function index(){
        $breadArray= getAll('SELECT * FROM bread ORDER BY label ASC', null);
		$cheeseArray = getAll('SELECT * FROM cheese ORDER BY label ASC', null);
		$meatArray = getAll('SELECT * FROM meat ORDER BY label ASC', null);
		$sauceArray = getAll('SELECT * FROM sauce ORDER BY label ASC', null);
		$vegetablesArray = getAll('SELECT * FROM vegetables ORDER BY label ASC', null);


		require 'app/Views/ingredient.view.php';
	}
}