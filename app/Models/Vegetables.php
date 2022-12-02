<?php

class Vegetables {
    private $pk_vegetables;
    private $db;
    private $label;
    private $img;

    // constructor
    function __construct($id) {
        $this->pk_vegetables = $id;
        $this->db = db();
        $this->setData();
    }

    // returns all vegetables from the database as class objects
    static function getAll() {
        $db = db();
        $statement = $db->prepare('SELECT pk_vegetables FROM vegetables ORDER BY label ASC');
        $statement->execute();

        $vegetables = [];

        foreach ($statement->fetchAll() as $v) {
            array_push($vegetables, new Vegetables($v['pk_vegetables']));
        }

        return $vegetables;
    }

    // inserts a dataset and returns an instance of an object
    static function create($label, $img) {
        $db = db();
        $statement = $db->prepare('INSERT INTO vegetables (label, img) VALUES (:label, :img)');
        $statement->bindParam(':label', $label);
        $statement->bindParam(':img', $img);
        if ($statement->execute()) return new Vegetables($db->lastInsertId());
        return null;
    }

    // get data from database and set variables
    function setData() {
        $statement = $this->db->prepare('SELECT label, img FROM vegetables WHERE pk_vegetables = :id LIMIT 1');
        $statement->bindParam(':id', $this->pk_vegetables);
        $statement->execute();

        if ($statement->rowCount() > 0) {
            $result = $statement->fetch();
            $this->label = $result['label'];
            $this->img = $result['img'];
        }
    }

    // get methods

    function getPK() {
        return $this->pk_vegetables;
    }

    function getLabel() {
        return $this->label;
    }

    function getImg() {
        return $this->img;
    }
}