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
    function getLabel() {
        return $this->label;
    }

    function getImg() {
        return $this->img;
    }

    
}