<?php

function connectDatabase()
{
    try {
        return new PDO('mysql:host=127.0.0.1;dbname=sandwichsurf', 'root', '');
    } catch (PDOException $e) {
        die('Keine Verbindung zur Datenbank möglich: ' . $e->getMessage());
    }
}

function getAll($sql, $parms){

    $conn = db();
    $statement = $conn->prepare($sql);

    if(isset($parms)){
        $statement->execute($parms);
    }else{
        $statement->execute();
    }
    
    $res = $statement->fetchAll(PDO::FETCH_CLASS);
    return $res;
}

function saveData($sql, $parms){

    $conn = db();
    $statement = $conn->prepare($sql);
    
    /*$size = count($parms);

    for($i =0 ; $i< $size; $i++){
        $statement->bindParam($i+1, $parms[$i]);
    }*/
    
    $statement->execute($parms);

    return $conn->lastInsertId();


}