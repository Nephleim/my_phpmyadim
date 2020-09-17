<?php
function connect() {
    $servername = "localhost:3308";
    $username = "root";
    $password = "";
    
    try {
        $conn = new PDO("mysql:host=$servername", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch(PDOException $e) {
        echo "\n" . $e->getMessage();
      }
      
      return $conn;
}

function close($conn) {
    $conn = null;
}

function fetchFromDB($manager, $sql, $params) {
    $conn = $manager->conn;
    $stmt = $conn->prepare($sql);
    if($params != null) 
        $stmt->execute($params);
    else
        $stmt->execute();
    $data = $stmt->fetch();
    return $data;
}

function fetchAllFromDB($manager, $sql, $params) {
    $conn = $manager->conn;
    $stmt = $conn->prepare($sql);
     if($params != null) 
        $stmt->execute($params);
     else
         $stmt->execute();
    $data = $stmt->fetchAll();
    return $data;
}

?>