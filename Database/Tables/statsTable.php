<?php

require_once('../Manager.php');
require_once('../connect.php');

$dbname = $_GET['dbname'];
$tableName = $_GET['tableName'];
$manager = new Manager();
try{
    $result_array = [];

    $result = fetchAllFromDB($manager, "SELECT count(*) FROM information_schema.columns WHERE table_schema = '$dbname' AND table_name = '$tableName';", null);
    foreach($result as $each) {
       array_push($result_array, $each[0]);
     }
    $result = fetchAllFromDB($manager, "SELECT create_time FROM INFORMATION_SCHEMA.TABLES WHERE table_schema = '$dbname' AND table_name = '$tableName';", null);
    foreach($result as $each) {
       array_push($result_array, $each[0]);
    }
    
    $result = fetchAllFromDB($manager, "SELECT TABLE_NAME AS `Table`, SUM(data_length + index_length) FROM information_schema.TABLES WHERE TABLE_SCHEMA = '$dbname' AND TABLE_NAME = '$tableName';", null);
    foreach($result as $each) {
       array_push($result_array, $each[1]);
    }
    echo json_encode($result_array);
} catch(PDOException $e){
    die("ERROR:" . $e->getMessage());
}

?>