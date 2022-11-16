<?php

class Cheese {
    private $pk_cheese;
    private $label;
    private $img;
    private $db;

    // constructor
    function __construct($id, $db) {
        $this->pk_cheese = $id;
        $this->db = $db;
        $this->setData();
    }

    // inserts a dataset and returns object of this class
    static function create($db, $label, $img) {
        $statement = $db->prepare('INSERT INTO cheese (label, img) VALUES (:label, :img)');
        $statement->bindParam(':label', $label);
        $statement->bindParam(':img', $img);
        if ($statement->execute()) return new Cheese($db->lastInsertId(), $db);
        return null;
    }

    // gets the value of label and img from the database and sets the member variable
    function setData() {
        $statement = $this->db->prepare('SELECT label, img from cheese WHERE pk_cheese = :id LIMIT 1');
        $statement->bindParam(':id', $this->pk_cheese);
        $statement->execute();
        if ($result->rowCount() > 0) {
            $this->label = $statement->fetch()['label'];
            $this->img = $statement->fetch()['img'];
        }
    }

    // returns the label of the cheese
    function getLabel() {
        return $this->label;
    }

    function getImg() {
        return $this->img;
    }
}