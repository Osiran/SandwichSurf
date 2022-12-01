<?php

class Staff {
    private $pk_staffId;
    private $db;

    function __construct() {
        $this->pk_staffId = null;
        $this->db = db();
    }

    // checks password and returns boolean
    function login($id, $password) {
        $statement = $this->db->prepare('SELECT * FROM staff WHERE pk_staffId = :id LIMIT 1');
        $statement->bindParam(':id', $id);
        $statement->execute();

        $result = $statement->fetch();
        if ($result) {
            if ($password == $result['password']) {
                $this->pk_staffId = $id;
                return $this->pk_staffId;
            }
        }
        return false;
    }

    function getPK() {
        return $this->pk_staffId;
    }
}