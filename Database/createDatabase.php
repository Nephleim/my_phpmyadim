<?php

require_once('Manager.php');

$dbname = $_POST['dbname'];
$manager = new Manager();
try{
    $sql = "CREATE DATABASE $dbname";
    $manager->conn->exec($sql);
    echo "Database created successfully";
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

?>