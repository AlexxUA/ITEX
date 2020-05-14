<?php
    $dbhost = 'localhost';
    $dbport = '27017';
    $dbname = 'dbItex';
    $lessons = 'dbItex.itech';

    $conn = new MongoDB\Driver\Manager("mongodb://$dbhost:$dbport");

    $read = new MongoDB\Driver\Query([], []);
    $lesson = $conn->executeQuery($lessons , $read);
    $json = json_encode(iterator_to_array($lesson));
echo $json;