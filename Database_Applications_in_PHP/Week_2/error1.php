<?php
  $pdo = new PDO('mysql:host=localhost;port=3306;dbname=misc','fred','zap'); //here we provide the database server details and fred is the id and zap is the password for accessing the database
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  try {
    $stmt = $pdo->prepare("select * from users where user_id = :xyz");
    $stmt->execute(array(":pizza" => $_GET['user_id'])); //error
  } catch (Exception $ex) {
    // echo "Exception message: ".$ex->getMessage(); this error message is not useful for the user
    echo "Internal error, please contact support";
    error_log("error1.php, SQL error=".$ex->getMessage());
    return;
  }
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  if ($row == false) {
    echo("<p>user_id not found</p>\n");
  } else {
    echo("<p>user_id found</p>\n");
  }
?>
