<?php

require_once('../Manager.php');
require_once('../connect.php');

$dbname = $_GET["dbname"];

$manager = new Manager();

$sql = fetchAllFromDB($manager, "SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA='$dbname';", null);
$result = [];
    
foreach($sql as $each) {
  array_push($result, $each[0]);
}
  
$manager->conn = null;
echo json_encode($result);


?>