<?php

require_once('../Manager.php');

$dbname = $_POST['dbname'];
$tableName = $_POST['tableName'];
$columnName = $_POST['columnName'];
$columnType = $_POST['columnType'];
$columnSize = $_POST['columnSize'];
$manager = new Manager();
try{
    $sql = "USE $dbname";
    $manager->conn->exec($sql);
    if ($columnType !="DATE") {
        $sql = "ALTER TABLE $tableName ADD $columnName $columnType($columnSize);";
        $manager->conn->exec($sql);
    } else {
        $sql = "ALTER TABLE $tableName ADD $columnName DATE NULL DEFAULT NULL;";
        $manager->conn->exec($sql);
    }
    
    echo "Added column to table successfully";
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

?>