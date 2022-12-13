<?php

class Order {
    private $pk_orders;
    private $db;
    private $bread;
    private $meat;
    private $cheese;
    private $sauce;
    private $vegetables;

    // constructor
    function __construct($id) {
        $this->pk_orders = $id;
        $this->db = db();
        $this->setData();
        $this->setVegetables();
    }

    // returns all orders as array of class objects
    static function getAll() {
        $db = db();
        $statement = $db->prepare('SELECT pk_orders FROM orders');
        $statement->execute();

        $orders = [];
        foreach ($statement->fetchAll() as $order) {
            array_push($orders, new Order($order['pk_orders']));
        }
        return $orders;
    }

    // inserts a dataset into the database and returns instance of Order
    static function create($bread, $meat, $cheese, $sauce) {
        $db = db();
        $statement = $db->prepare('INSERT INTO orders (fk_bread, fk_meat, fk_cheese, fk_sauce) VALUES 
        (:fk_bread, :fk_meat, :fk_cheese, :fk_sauce)');
        $statement->bindParam(':fk_bread', $bread);
        $statement->bindParam(':fk_meat', $meat);
        $statement->bindParam(':fk_cheese', $cheese);
        $statement->bindParam(':fk_sauce', $sauce);

        if ($statement->execute()) return new Order($db->lastInsertId());
        return null;
    }

    // set data

    function setData() {
        $statement = $this->db->prepare('SELECT fk_bread, fk_meat, fk_cheese, fk_sauce FROM orders WHERE pk_orders = :id LIMIT 1');
        $statement->bindParam(':id', $this->pk_orders);
        $statement->execute();
        $result = $statement->fetch();

        require 'app/Models/Bread.php';
        require 'app/Models/Meat.php';
        require 'app/Models/Cheese.php';
        require 'app/Models/Sauce.php';

        $this->bread = new Bread($result['fk_bread']);
        $this->meat = new Meat($result['fk_meat']);
        $this->cheese = new Cheese($result['fk_cheese']);
        $this->sauce = new Sauce($result['fk_sauce']);
    }

    function setVegetables() {
        $this->vegetables = [];
        $statement = $this->db->prepare('SELECT fk_vegetables FROM orders_vegetables WHERE fk_orders = :id');
        $statement->bindParam(':id', $this->pk_orders);
        $statement->execute();

        if ($statement->rowCount() > 0) {
            foreach ($statement->fetchAll() as $v) {
                array_push($this->vegetables, new Vegetables($v['fk_vegetables']));
            }
        } else {
            $this->vegetables = [];
        }
    }

    // add vegetables to this order
    function addVegetables($vegetables) {
        $statement = $this->db->prepare('INSERT INTO orders_vegetables (fk_orders, fk_vegetables) VALUES (:orders, :vegetables)');
        $statement->bindParam(':orders', $this->pk_orders);
        $statement->bindParam(':vegetables', $vegetables->getPK());

        if ($statement->execute()) {
            $this->setVegetables();
        }
    }

    // get methods

    function getPK() {
        return $this->pk_orders;
    }

    function getBread() {
        return $this->bread;
    }

    function getMeat() {
        return $this->meat;
    }

    function getCheese() {
        return $this->cheese;
    }

    function getSauce() {
        return $this->sauce;
    }

    function getVegetables() {
        return $this->vegetables;
    }

    // deletes this order
    function delete() {
        $statement = $this->db->prepare('DELETE FROM orders WHERE pk_orders = :id');
        $statement->bindParam(':id', $this->pk_orders);
        return $statement->execute();
    }

    // updates this order
    function update($bread, $meat, $cheese, $sauce) {
        $statement = $this->db->prepare('UPDATE orders SET fk_bread = :bread, fk_meat = :meat, fk_cheese = :cheese, 
        fk_sauce = :sauce WHERE pk_orders = :id');
        $statement->bindParam(':bread', $bread);
        $statement->bindParam(':meat', $meat);
        $statement->bindParam(':cheese', $cheese);
        $statement->bindParam(':sauce', $sauce);
        $statement->bindParam(':id', $this->pk_orders);

        if ($statement->execute()) {
            $this->setData();
        }
    }
}