<?php

class Meat {
    private $pk_meat;
    private $db;
    private $label;
    private $img;

    // constructor
    function __construct($pk_meat) {
        $this->db = db();
        $this->pk_meat = $pk_meat;
        $this->setData();
    }

    static function getAll() {
        $db = db();
        $statement = $db->prepare('SELECT pk_meat FROM meat ORDER BY label ASC');
        $statement->execute();

        $meatList = [];
        foreach ($statement->fetchAll() as $meat) {
            array_push($meatList, new Meat($meat['pk_meat']));
        }

        return $meatList;
    }

    // inserts a dataset into meat and returns a meat object
    static function create($label, $img) {
        $db = db();
        $statement = $db->prepare('INSERT INTO meat (label, img) VALUES (:label, :img)');
        $statement->bindParam(':label', $label);
        $statement->bindParam(':img', $img);
        if ($statement->execute()) return new Meat($db->lastInsertId());
        return null;
    }

    // sets the member variables with data from the db
    function setData() {
        $statement = $this->db->prepare('SELECT label, img FROM meat WHERE pk_meat = :id LIMIT 1');
        $statement->bindParam(':id', $this->pk_meat);
        $statement->execute();

        if ($statement->rowCount() > 0) {
            $result = $statement->fetch();
            $this->label = $result['label'];
            $this->img = $result['img'];
        }
    }

    // get methods

    function getPK() {
        return $this->pk_meat;
    }

    function getLabel() {
        return $this->label;
    }

    function getImg() {
        return $this->img;
    }
}