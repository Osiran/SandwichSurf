<?php

class Bread {
    private $pk_bread;
    private $db;
    private $label;
    private $img;

    // constructor
    function __construct($id) {
        $this->db = db();
        $this->pk_bread = $id;
        $this->setData();
    }

    static function getAll() {
        $db = db();
        $statement = $db->prepare('SELECT pk_bread FROM bread ORDER BY label ASC');
        $statement->execute();

        $breads = [];
        foreach ($statement->fetchAll() as $bread) {
            array_push($breads, new Bread($bread['pk_bread']));
        }

        return $breads;
    }

    // inserts a dataset and returns an instance of Bread
    static function create($label, $img) {
        $db = db();
        $statement = $db->prepare('INSERT INTO bread (label, img) VALUES (:label, :img)');
        $statement->bindParam(':label', $label);
        $statement->bindParam(':img', $img);
        if ($statement->execute()) return new Bread($db->lastInsertId());
        return null;
    }

    // gets data from the database and sets the variables
    function setData() {
        $statement = $this->db->prepare('SELECT label, img FROM bread WHERE pk_bread = :id LIMIT 1');
        $statement->bindParam(':id', $this->pk_bread);
        $statement->execute();

        if ($statement->rowCount() > 0) {
            $result = $statement->fetch();
            $this->label = $result['label'];
            $this->img = $result['img'];
        }
    }

    // get methods

    function getPK() {
        return $this->pk_bread;
    }

    function getLabel() {
        return $this->label;
    }

    function getImg() {
        return $this->img;
    }
}