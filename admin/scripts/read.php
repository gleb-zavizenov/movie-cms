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

function getSingleMovie($tbl, $col, $id){
    $pdo = Database::getInstance()->getConnection();

    $query = 'SELECT * FROM ' . $tbl . ' WHERE ' . $col .'=' . $id;
    $movie = $pdo->query($query);

    if($movie){
        return $movie;
    } else {
        return 'Problem connecting to a database';
    }
}

function getMoviesByFilter($args){
    $pdo = Database::getInstance()->getConnection();

    $queryAll = 'SELECT * FROM ' . $args['tbl'] . ' AS t, ';
    $queryAll .= ' ' . $args['tbl2'] . ' AS t2,';
    $queryAll .= ' ' . $args['tbl3'] . ' AS t3 ';
    $queryAll .= ' WHERE t.' . $args['col'] . ' = t3.' .$args['col'];
    $queryAll .= ' AND t2.' . $args['col2'] . ' = t3.' .$args['col2'];
    $queryAll .= ' AND t2.' . $args['col3'] . ' = "' .$args['filter']. '"';

    //echo $queryAll;
    //exit;

    $results = $pdo->query($queryAll);

    if($results){
        return $results;
    } else {
        return 'Problem connecting to a database';
    }
}