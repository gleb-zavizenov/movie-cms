<?php

include_once('../config/database.php');
include_once('../config/database_old.php');

$start = microtime(true);

# the new way


$i=0;
while($i < 100){
    $database = Database::getInstance()->getConnection();
    $new_time = microtime(true) - $start;
    $i++;
}

$start = microtime(true);

$a = 0;
while($a < 100){
    # the old way
    $database_old = new Database_Old();
    $database_connection = $database_old->getConnection();
    $a++;
}

$old_time = microtime(true) - $start;

echo ('Old time => ' . $old_time . '<br>');
echo ('New time => ' . $new_time);
