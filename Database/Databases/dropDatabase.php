<?php

require_once('../Manager.php');

$dbname = $_POST['dbname'];
$manager = new Manager();
try{
    $sql = "DROP DATABASE $dbname";
    $manager->conn->exec($sql);
    echo "Database deleted successfully";
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

?>