<?php

require_once("../Manager.php");
require_once("../connect.php");

$manager = new Manager();
$dbname = $_GET["dbname"];

try {
    $tables = [];
    $array = fetchAllFromDB($manager, "SELECT table_name FROM information_schema.tables WHERE table_schema='$dbname'", null);
    foreach ($array as $table) 
    {
        array_push($tables, $table[0]);
    }
    echo json_encode($tables);

} catch (PDOException $e) {
    echo "ERROR retrieving tables from database $dbname : " . $e->getMessage();
}


?>