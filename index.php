<?php

  require_once('./Database/functions.php');

  getTables();    
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
<br>
<br>
<br>
<br>
<br>
<br>
Nom base de données: <input type="text" id="dbNameDisplayTable">
<br>
<button type="button" id="sendDisplayTable" >Afficher tables</button>
<!-- Nom base de données: <input type="text" id="dbNameCreateTable">
<br>
Nom table: <input type="text" id="tableNameCreate">
<br>
<button type="button" id="sendCreateTable" >Créer la table</button> -->
<br>
<br>
<br>
<br>
Nom base de données: <input type="text" id="dbNameRenameTable">
<br>
Ancien nom table: <input type="text" id="tableNameRenameOld">
<br>
Nouveau nom table: <input type="text" id="tableNameRenameNew">
<br>
<button type="button" id="sendRenameTable" >Renommer la table</button>
<br>
<br>
<br>
<br>
Nom base de données: <input type="text" id="dbNameAddToTable">
<br>
Nom table: <input type="text" id="tableNameAddToTable">
<br>
Nom colonne: <input type="text" id="columnAddToTable">
Type colonne:
<select name="Type" id="columnTypeAddToTable">
  <option value="INT">INT</option>
  <option value="VARCHAR">VARCHAR</option>
  <option value="TEXT">TEXT</option>
  <option value="DATE">DATE</option>
</select>
Taille élément: <input type="text" id="columnSizeAddToTable">
<br>
<button type="button" id="sendAddToTable" >Ajouter à la table</button>
<br>
<br>
<br>
<br>
Nom base de données: <input type="text" id="dbNameDeleteColumn">
<br>
Nom table: <input type="text" id="tableNameDeleteColumn">
<br>
Nom colonne: <input type="text" id="columnNameDeleteColumn">
<br>
<button type="button" id="sendDeleteColumn" >Supprimer colonne</button>
<br>
<br>
<br>
<br>
Nom base de données: <input type="text" id="dbNameRenameColumn">
<br>
Nom table: <input type="text" id="tableNameRenameColumn">
<br>
Ancien nom colonne: <input type="text" id="columnNameRenameColumnOld">
<br>
Nouveau nom colonne: <input type="text" id="columnNameRenameColumnNew">
Type colonne:
<select name="Type" id="columnTypeRenameColumn">
  <option value="INT">INT</option>
  <option value="VARCHAR">VARCHAR</option>
  <option value="TEXT">TEXT</option>
  <option value="DATE">DATE</option>
</select>
Taille élément: <input type="text" id="columnSizeRenameColumn">
<br>
<button type="button" id="sendRenameColumn" >Renommer colonne</button>
<br>
<br>
<br>
<br>
Nom base de données: <input type="text" id="dbInputStatsTable">
<br>
Nom table: <input type="text" id="tableInputStatsTable">
<br>
<button type="button" id="sendStatsTable" >Afficher Stats de la table</button>
<br>
<div id="result"><b>Person info will be listed here.</b></div>




</body>

</html>



