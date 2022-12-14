<?php

class Cheese
{
    private $pk_cheese;
    private $label;
    private $img;
    private $db;

    // constructor
    function __construct($id)
    {
        $this->pk_cheese = $id;
        $this->db = db();
        $this->setData();
    }

    static function getAll()
    {
        $db = db();
        $statement = $db->prepare('SELECT pk_cheese FROM cheese ORDER BY label ASC');
        $statement->execute();

        $cheeseList = [];
        foreach ($statement->fetchAll() as $cheese) {
            array_push($cheeseList, new Cheese($cheese['pk_cheese']));
        }

        return $cheeseList;
    }

    // inserts a dataset and returns object of this class
    static function create($label, $img)
    {
        $db = db();
        $statement = $db->prepare('INSERT INTO cheese (label, img) VALUES (:label, :img)');
        $statement->bindParam(':label', $label);
        $statement->bindParam(':img', $img);
        if ($statement->execute()) return new Cheese($db->lastInsertId());
        return null;
    }

    // gets the value of label and img from the database and sets the member variable
    function setData()
    {
        $statement = $this->db->prepare('SELECT label, img from cheese WHERE pk_cheese = :id LIMIT 1');
        $statement->bindParam(':id', $this->pk_cheese);
        $statement->execute();
        if ($statement->rowCount() > 0) {
            $result = $statement->fetch();
            $this->label = $result['label'];
            $this->img = $result['img'];
        }
    }

    // return pk
    function getPK()
    {
        return $this->pk_cheese;
    }

    // returns the label of the cheese
    function getLabel()
    {
        return $this->label;
    }

    // returns the image variable
    function getImg()
    {
        return $this->img;
    }
}
