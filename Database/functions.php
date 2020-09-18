<?php
    require_once('C:\wamp64\www\Models\Databases.php');
    require_once('C:\wamp64\www\Models\Table.php');
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

    foreach($array as $each) 
    {
      print_r($each[0]);
      echo('<br>');
    }
}

//  function getTables() {
//       $databases = getDatabases();
//      $manager = new Manager();
//      $array = [];

//      $sql = "SELECT TABLE_SCHEMA, TABLE_NAME, TABLE_ROWS FROM INFORMATION_SCHEMA.TABLES  WHERE TABLE_SCHEMA = ?;";
//      foreach ($databases as $db) {
//       $tables_data = fetchAllFromDB($manager, $sql, [
//         $db->name
//       ]);
//        array_push($array, $tables_data);
//      }
//      $manager->conn = null;
//      return $array;
//  }

 function getTable() {
  $manager = new Manager();
  $array = [];

  $sql = "SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE table_schema='test';";
  
   $tables_data = fetchAllFromDB($manager, $sql, null);


   foreach($tables_data as $each) 
    {
      $str = $each[0];
      array_push($array, $str);
    }
    
    foreach($array as $name) {
      $sql = "CREATE TABLE IF NOT EXISTS test0.$name LIKE test.$name;";
      $manager->conn->exec($sql);
  }
  
  $manager->conn = null;
  print_r($array);
 }

//  function displayDatabases($list) {
//   foreach($list as $each) 
//   {
//     print_r($each);
//     echo('<br>');
//   }
//  }

 function displayTables($list) {
  foreach($list as $each) 
  {
    print_r($each);
    echo('<br>');
  }
 }







?>