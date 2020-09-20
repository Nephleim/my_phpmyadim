<?php

require_once('../Manager.php');
require_once('../connect.php');

$manager = new Manager();

$dbname = $_GET["dbname"];
$tableName = $_GET["tableName"];

try {
    $lines = [];
    $array = fetchAllFromDB($manager, "SELECT * FROM $dbname.$tableName", null);
    foreach ($array as $line) 
    {
        array_push($lines, $line);
    }
    echo json_encode($lines);

} catch (PDOException $e) {
    echo "ERROR retrieving tables from database $dbname : " . $e->getMessage();
}

?>