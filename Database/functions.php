<?php
    require_once('./Models/Databases.php');
    require_once('./Models/Table.php');
    require_once('connect.php');
    require_once('Manager.php');

function getDatabases() {
    $manager = new Manager();
        
    $array = fetchAllFromDB($manager, "SHOW DATABASES", null);

    foreach ($array as $db) {
        $database = new Databases($db[0]);
        array_push($manager->databases_list, $database);
    }
    $manager->conn = null;
    return $manager->databases_list;
}

 function getTables() {
      $databases = getDatabases();
     $manager = new Manager();
     $array = [];

     $sql = "SELECT TABLE_SCHEMA, TABLE_NAME, TABLE_ROWS FROM INFORMATION_SCHEMA.TABLES  WHERE TABLE_SCHEMA = ?;";
     foreach ($databases as $db) {
       $tables_data = fetchAllFromDB($manager, $sql, [
         $db->name
       ]);
       array_push($array, $tables_data);
     }
     $manager->conn = null;
     return $array;
 }

 function displayDatabases($list) {
  foreach($list as $each) 
  {
    print_r($each);
    echo('<br>');
  }
 }

 function displayTables($list) {
  foreach($list as $each) 
  {
    print_r($each);
    echo('<br>');
  }
 }







?>