<?php

require_once('../Manager.php');

$dbname = $_POST['dbname'];
$tableNameOld = $_POST['tableNameOld'];
$tableNameNew = $_POST['tableNameNew'];
$manager = new Manager();
try{
    $sql = "USE $dbname";
    $manager->conn->exec($sql);
    $sql = "RENAME TABLE $tableNameOld TO $tableNameNew;";
    $manager->conn->exec($sql);
    echo "Table renamed successfully";
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

?>