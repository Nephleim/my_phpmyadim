<?php

require_once('../Manager.php');

$dbname = $_POST["dbname"];
$tableName = $_POST["tableName"];
$columnName = $_POST["columnName"];
$value = $_POST["value"];

$manager = new Manager();

try{
    $sql = "USE $dbname;";
    $manager->conn->exec($sql);
    $sql = "DELETE FROM $tableName WHERE $columnName = $value;";
    $manager->conn->exec($sql);
    echo "Row(s) deleted successfully";
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}


?>