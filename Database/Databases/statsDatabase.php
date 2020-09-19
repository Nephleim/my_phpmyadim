<?php

require_once('../Manager.php');
require_once('../connect.php');

$dbname = $_GET['dbname'];


$manager = new Manager();
try{
    $result_array = [];

    $result = fetchAllFromDB($manager, "SELECT COUNT(*) FROM information_schema.tables WHERE table_schema = '$dbname';", null);
    foreach($result as $each) 
     {
       array_push($result_array, $each[0]);
     }
     $result = fetchAllFromDB($manager, "SELECT table_schema, MIN(create_time) AS Creation_Time FROM information_schema.tables WHERE table_schema = '$dbname';", null);
     foreach($result as $each) 
     {
       array_push($result_array, $each[1]);
     }
     $result = fetchAllFromDB($manager, "SELECT SUM(data_length + index_length) FROM information_schema.tables WHERE table_schema = '$dbname';", null);
     foreach($result as $each) 
     {
       array_push($result_array, $each[0]);
     }
    echo json_encode($result_array);
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

?>