<?php

require_once('Manager.php');
require_once('connect.php');



$dbnameNew = $_POST['dbnameNew'];
$dbnameOld = $_POST['dbnameOld'];
$manager = new Manager();

try{
  $sql = "SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE table_schema='$dbnameOld';";
  
    $tables_data = fetchAllFromDB($manager, $sql, null);
    $sql = "CREATE DATABASE $dbnameNew";
    $manager->conn->exec($sql);
    $array = [];

    $sql = "SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE table_schema='$dbnameOld';";
  
    $tables_data = fetchAllFromDB($manager, $sql, null);
 
 
    foreach($tables_data as $each) 
     {
       $str = $each[0];
       array_push($array, $str);
     }
     
     foreach($array as $name) {
       $sql = "CREATE TABLE IF NOT EXISTS $dbnameNew.$name LIKE $dbnameOld.$name;";
       $manager->conn->exec($sql);
       $sql = "INSERT $dbnameNew.$name SELECT * FROM $dbnameOld.$name;";
       $manager->conn->exec($sql);
   }

    $sql = "DROP DATABASE $dbnameOld";
    $manager->conn->exec($sql);
   $manager->conn = null;
    echo "Renamed $dbnameOld to $dbnameNew";
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}



?>