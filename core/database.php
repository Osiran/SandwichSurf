<?php

// Kept for backwards compatibility; delegates to the env-aware db() in helpers.php
// so there is a single place that owns the connection settings.
function connectDatabase()
{
    return db();
}

function getAll($sql, $parms)
{
    $conn = db();
    $statement = $conn->prepare($sql);

    if (isset($parms)) {
        $statement->execute($parms);
    } else {
        $statement->execute();
    }

    // FETCH_OBJ returns stdClass rows so the views can use $row->column.
    return $statement->fetchAll(PDO::FETCH_OBJ);
}

function saveData($sql, $parms)
{
    $conn = db();
    $statement = $conn->prepare($sql);
    $statement->execute($parms);

    return $conn->lastInsertId();
}
