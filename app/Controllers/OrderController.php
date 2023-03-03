<?php

class OrderController {

    // returns all orders as array of class objects
    static function index() {
        $orderArray = getAll('SELECT pk_orders, m.label as meat, c.label as cheese, b.label as bread, s.label as sauce 
        FROM orders as o 
        join meat as m on o.fk_meat = m.pk_meat
        join cheese as c on o.fk_cheese = c.pk_cheese
        join bread as b on o.fk_bread = b.pk_bread
        join sauce as s on o.fk_sauce = s.pk_sauce');
        for($i = 0; $i < count($orderArray); $i++){
            $orderid= $orderArray[$i]->pk_orders;
            $orderArray[$i]->vegetables = getAll( "SELECT v.label as label from orders_vegetables as ov
            join vegetables as v on v.pk_vegetables = ov.fk_vegetables
            where ov.fk_orders = $orderid");
        }
        require 'app/Views/overview.view.php';
    }


    //GET Request for http://localhost/sandwichsurf/orders
	public function createGET(){
        $breadArray= getAll('SELECT * FROM bread ORDER BY label ASC');
		$cheeseArray = getAll('SELECT * FROM cheese ORDER BY label ASC');
		$meatArray = getAll('SELECT * FROM meat ORDER BY label ASC');
		$sauceArray = getAll('SELECT * FROM sauce ORDER BY label ASC');
		$vegetablesArray = getAll('SELECT * FROM vegetables ORDER BY label ASC');

		require 'app/Views/order.view.php';
	}


    // inserts a dataset into the database and returns instance of Order
    static function createPOST() {

        $bread_id = $_POST['bread'];
        $meat_id = $_POST['meat'];
        $cheese_id = $_POST['cheese'];
        $sauce_id = $_POST['sauce'];
        $orderId = saveData("INSERT INTO orders (fk_bread, fk_meat, fk_cheese, fk_sauce)
        VALUES ($bread_id,$meat_id, $cheese_id, $sauce_id)");

		foreach ($_POST['vegetables'] as $key => $value) {
            saveData("INSERT INTO orders_vegetables (fk_orders, fk_vegetables) VALUES ($orderId, $value)");
            //$vegetables = getAll('SELECT fk_vegetables FROM orders_vegetables WHERE fk_orders = '$id'');
		}
		header('location: ' . dirname($_SERVER['SCRIPT_NAME']) . '/orderNr?id=' . $orderId);
    }

    
	public function orderNr(){
		require 'app/Views/orderNr.view.php';
	}

}