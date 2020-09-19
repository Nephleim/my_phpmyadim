<?php

require_once('../Manager.php');

$dbname = $_POST['dbname'];
$tableName = $_POST['tableName'];
$columnName = $_POST['columnName'];

$manager = new Manager();
try{
    $sql = "USE $dbname";
    $manager->conn->exec($sql);

    $sql = "ALTER TABLE $tableName DROP COLUMN $columnName;";
    $manager->conn->exec($sql);

    echo "Dropped column successfully";
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

?>