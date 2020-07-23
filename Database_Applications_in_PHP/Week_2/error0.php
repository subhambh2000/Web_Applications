<?php
  $pdo = new PDO('mysql:host=localhost;port=3306;dbname=misc','fred','zap'); //here we provide the database server details and fred is the id and zap is the password for accessing the database
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $stmt = $pdo->prepare("select * from users where user_id = :xyz");
  $stmt->execute(array(":pizza" => $_GET['user_id'])); //error
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  if ($row == false) {
    echo("<p>user_id not found</p>\n");
  } else {
    echo("<p>user_id found</p>\n");
  }
?>
