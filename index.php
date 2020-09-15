<?php

  require_once('./Database/functions.php');

  $databases = getDatabases();
   $tables = getTables();


?>

<html>
<?php
//mettre ça dans une fontion displayDatabases();
  foreach($databases as $db) 
  {
    print_r($db);
    echo('<br>');
  }
  echo('--------------------------------------------<br>');

  foreach($tables as $db) 
  {
    print_r($db);
    echo('<br>--------------------------------------------<br>');
  }
  
?>
</html>



