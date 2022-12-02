<?php

class Sauce {
    private $pk_sauce;
    private $db;
    private $label;
    private $img;

    // constructor
    function __construct($id) {
        $this->pk_sauce = $id;
        $this->db = db();
        $this->setData();
    }

    // returns array of all sauces in the db
    static function getAll() {
        $db = db();
        $statement = $db->prepare('SELECT pk_sauce FROM sauce ORDER BY label ASC');
        $statement->execute();

        $sauces = [];
        foreach ($statement->fetchAll() as $sauce) {
            array_push($sauces, new Sauce($sauce['pk_sauce']));
        }

        return $sauces;
    }

    // inserts a dataset and returns an instance of an object
    static function create($label, $img) {
        $db = db();
        $statement = $db->prepare('INSERT INTO sauce (label, img) VALUES (:label, :img)');
        $statement->bindParam(':label', $label);
        $statement->bindParam(':img', $img);
        if ($statement->execute()) return new Sauce($db->lastInsertId());
        return null;
    }

    // get data from database and set variables
    function setData() {
        $statement = $this->db->prepare('SELECT label, img FROM sauce WHERE pk_sauce = :id LIMIT 1');
        $statement->bindParam(':id', $this->pk_sauce);
        $statement->execute();

        if ($statement->rowCount() > 0) {
            $result = $statement->fetch();
            $this->label = $result['label'];
            $this->img = $result['img'];
        }
    }

    // get methods

    function getPK() {
        return $this->pk_sauce;
    }

    function getLabel() {
        return $this->label;
    }

    function getImg() {
        return $this->img;
    }
}