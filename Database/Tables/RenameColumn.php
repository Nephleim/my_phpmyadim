<?php

require_once('../Manager.php');

$dbname = $_POST['dbname'];
$tableName = $_POST['tableName'];
$columnNameOld = $_POST['columnNameOld'];
$columnNameNew = $_POST['columnNameNew'];
$columnType = $_POST['columnType'];
$columnSize = $_POST['columnSize'];

$manager = new Manager();
try{
    $sql = "USE $dbname";
    $manager->conn->exec($sql);
    if ($columnType !="DATE") {
        $sql = "ALTER TABLE `$tableName` CHANGE `$columnNameOld` `$columnNameNew` $columnType($columnSize);";
        $manager->conn->exec($sql);
    }else {
        $sql = "ALTER TABLE $tableName CHANGE `$columnNameOld` `$columnNameNew` DATE NULL DEFAULT NULL;";
        $manager->conn->exec($sql);
    }
    

    echo "Renamed column successfully";
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

?>