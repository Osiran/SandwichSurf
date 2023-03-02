<?php

function connectDatabase()
{
    try {
        return new PDO('mysql:host=127.0.0.1;dbname=sandwichsurf', 'root', '');
    } catch (PDOException $e) {
        die('Keine Verbindung zur Datenbank möglich: ' . $e->getMessage());
    }
}

function getAll($sql){

    $db = db();
    $statement = $db->prepare($sql);
    $statement->execute();
    $res = $statement->fetchAll(PDO::FETCH_CLASS);
    return $res;
}

function saveData($sql){

    $db = db();
    $statement = $db->prepare($sql);
    $statement->execute();
    return $db->lastInsertId();


}