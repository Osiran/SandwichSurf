<?php

class Order {
    private $pk_orders;
    private $db;
    private $bread;
    private $meat;
    private $cheese;
    private $sauce;
    private $vegetables;
    private $timestamp;

    function __construct($id) {
        $this->pk_orders = $id;
        $this->db = db();
        $this->setData();
        $this->setVegetables();
    }

    static function create($bread, $meat, $cheese, $sauce, $timestamp) {
        $db = db();
        $statement = $db->prepare('INSERT INTO orders (pk_bread, pk_meat, pk_cheese, pk_sauce, timestamp) VALUES 
        (:pk_bread, :pk_meat, :pk_cheese, :pk_sauce, :timestamp)');
        $statement->bindParam(':pk_bread', $bread);
        $statement->bindParam(':pk_meat', $meat);
        $statement->bindParam(':pk_cheese', $cheese);
        $statement->bindParam(':pk_sauce', $sauce);
        $statement->bindParam(':timestamp', $timestamp);

        if ($statement->execute()) return new Order($db->lastInsertId());
        return null;
    }

    // set data

    function setData() {
        $statement = $this->db->prepare('SELECT fk_bread, fk_meat, fk_cheese, fk_sauce, timestamp FROM orders WHERE pk_orders = :id LIMIT 1');
        $statement->bindParam(':id', $this->pk_orders);
        $statement->execute();
        $result = $statement->fetch();
        $this->bread = new Bread($result['fk_bread']);
        $this->meat = new Meat($result['fk_meat']);
        $this->cheese = new Cheese($result['fk_cheese']);
        $this->sauce = new Sauce($result['fk_sauce']);
        $this->timestamp = $result['timestamp'];
    }

    function setVegetables() {
        $statement = $this->db->prepare('SELECT fk_vegetables FROM orders_vegetables WHERE fk_orders = :id ORDER BY label ASC');
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

    function getVegetables() {
        return $this->vegetables;
    }
}