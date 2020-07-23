<?php
  $pdo = new PDO('mysql:host=localhost;port=3306;dbname=misc','fred','zap'); //here we provide the database server details and fred is the id and zap is the password for accessing the database
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
