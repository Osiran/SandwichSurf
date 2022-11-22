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
        $statement = $db->prepare('SELECT pk_orders FROM orders ORDER BY timestamp DESC');
        $statement->execute();

        $orders = [];
        foreach ($statement->fetchAll() as $order) {
            array_push($orders, new Order($order['pk_orders']));
        }
        return $orders;
    }

    // inserts a dataset into the database and returns instance of Order
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
        $this->vegetables = [];
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
    function update($bread, $meat, $cheese, $sauce, $timestamp) {
        $statement = $this->db->prepare('UPDATE orders SET fk_bread = :bread, fk_meat = :meat, fk_cheese = :cheese, 
        fk_sauce = :sauce, timestamp = :timestamp WHERE pk_orders = :id');
        $statement->bindParam(':bread', $bread);
        $statement->bindParam(':meat', $meat);
        $statement->bindParam(':cheese', $cheese);
        $statement->bindParam(':sauce', $sauce);
        $statement->bindParam(':timestamp', $timestamp);
        $statement->bindParam(':id', $this->pk_orders);

        if ($statement->execute()) {
            $this->setData();
        }
    }
}