<?php

require_once('../Manager.php');
require_once('../connect.php');

$manager = new Manager();
          
      $array = fetchAllFromDB($manager, "SHOW DATABASES", null);
      $result = [];
      
      foreach($array as $each) 
    {
      array_push($result, $each[0]);
    }
    $manager->conn = null;
    echo json_encode($result);


?>