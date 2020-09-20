<?php

require_once('../Manager.php');
require_once('../connect.php');

$manager = new Manager();

$dbname = $_GET["dbname"];
$tableName = $_GET["tableName"];

try {
    $columns = [];

    $array = fetchAllFromDB($manager, "SELECT COLUMN_NAME,DATA_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE (TABLE_NAME = '$tableName')
                                   AND TABLE_SCHEMA='$dbname' ORDER BY ORDINAL_POSITION;", null);
    foreach ($array as $column) 
    {
        array_push($columns, $column);
    }
    echo json_encode($columns);

} catch (PDOException $e) {
    die("ERROR retrieving tables from database $dbname : " . $e->getMessage());
}

?>