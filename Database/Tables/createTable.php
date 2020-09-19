<?php

require_once('../Manager.php');

$dbname = $_POST['dbname'];
$tableNameCreate = $_POST['tableNameCreate'];
$manager = new Manager();
try{
    $sql = "USE $dbname";
    $manager->conn->exec($sql);
    $sql = "CREATE TABLE $tableNameCreate;";
    $manager->conn->exec($sql);
    echo "Table created successfully";
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

?>