<?php

  require_once('./Database/functions.php');

  $databases = getDatabases();
   $tables = getTables();
  displayDatabases($databases);

?>

<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Titre</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="./Database/ajax.js"></script>
    
    
</head>

<body>
      
Database Name: <input type="text" id="dbInputCreate">
<button type="button" id="sendDBName" >Créer base de données</button>

Database Name: <input type="text" id="dbInputDelete">
<button type="button" id="sendDeleteDB" >Supprimer base de données</button>

<div id="result"><b>Person info will be listed here.</b></div>




</body>

</html>



