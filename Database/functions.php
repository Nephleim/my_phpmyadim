<style>
<?php include 'style.css'; ?>
</style>
<?php
    require_once('C:\wamp64\www\Models\Databases.php');
    require_once('C:\wamp64\www\Models\Table.php');
    require_once('connect.php');
    require_once('Manager.php');

    function getDatabases() {
      $manager = new Manager();
          
      $array = fetchAllFromDB($manager, "SHOW DATABASES", null);
      
      foreach($array as $each) 
    {
      echo "<div class=\"db\">$each[0]</div>";
      echo('<br>');
    }
    $manager->conn = null;
  }

function getTables() {
    $manager = new Manager();
        
    $array = fetchAllFromDB($manager, "SHOW DATABASES", null);

    foreach ($array as $db) {
        $database = new Databases($db[0]);
        array_push($manager->databases_list, $database);
    }
    
    $sql = "SELECT TABLE_SCHEMA, TABLE_NAME, TABLE_ROWS FROM INFORMATION_SCHEMA.TABLES  WHERE TABLE_SCHEMA = ?;";
   foreach ($manager->databases_list as $db) {
    $tables_data = fetchAllFromDB($manager, $sql, [
      $db->name
    ]);
    echo "<div class=\"dbname\">$db->name</div>";
    foreach($tables_data as $each) {
      echo "<div class=\"tables\"> - $each[1]</div>";
    }
   }
  $manager->conn = null;
}

//  function getTables() {
//   getDatabases();
//    $manager = new Manager();
//    $array = [];

//    $sql = "SELECT TABLE_SCHEMA, TABLE_NAME, TABLE_ROWS FROM INFORMATION_SCHEMA.TABLES  WHERE TABLE_SCHEMA = ?;";
//    foreach ($manager->databases_list as $db) {
//     $tables_data = fetchAllFromDB($manager, $sql, [
//       $db->name
//     ]);
//      array_push($array, $tables_data);
//    }
//    $manager->conn = null;
//    foreach($array as $each) 
//     {
//       print_r($each[0]);
//       echo('<br>');
//     }
//   }

  


//  function displayDatabases($list) {
//   foreach($list as $each) 
//   {
//     print_r($each);
//     echo('<br>');
//   }
//  }

//  function display($list) {
//   foreach($list as $each) 
//     {
//       print_r($each[0]);
//       echo('<br>');
//     }
//  }







?>
