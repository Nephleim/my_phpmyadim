<?php

  require_once('./Database/functions.php');

  //  $tables = getTables();
  getDatabases();   
?>

<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>my_phpmyadmin</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="./Database/ajax.js"></script>
    
    
</head>

<body>
<br>
Nom base de données: <input type="text" id="dbInputCreate">
<br>
<button type="button" id="sendDBName" >Créer base de données</button>
<br>
<br>
<br>
<br>
Nom base de données: <input type="text" id="dbInputDelete">
<br>
<button type="button" id="sendDeleteDB" >Supprimer base de données</button>
<br>
<br>
<br>
<br>
Ancien nom base de données: <input type="text" id="dbInputRenameOld">
<br>
Nouveau nom base de données: <input type="text" id="dbInputRenameNew">
<br>
<button type="button" id="sendRenameDB" >Renommer base de données</button>
<br>
<br>
<br>
<br>
Nom base de données: <input type="text" id="dbInputStats">
<br>
<button type="button" id="sendStatsDB" >Voir les statistiques de la base de données</button>

<br>
<br>
<div id="result"><b>Person info will be listed here.</b></div>




</body>

</html>



