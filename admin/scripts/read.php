<?php 

function getAll($table){
    $pdo = Database::getInstance()->getConnection();

    $queryAll = 'SELECT * FROM ' . $table;
    $results = $pdo->query($queryAll);

    if($results){
        return $results;
    } else {
        return 'Problems accesing a database';
    }
};
