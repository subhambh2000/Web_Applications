<?php
require_once "pdo.php";
session_start();

  if (isset($_POST['cancel'])) {
    header('Location: index.php');
    return;
  }
  if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {
  $sql = "insert into users (name,email,password) values (:name,:email,:password)";
  // echo("<pre>\n".$sql."\n</pre>\n");
  $stmt = $pdo->prepare($sql);
  $stmt->execute(array(
    ':name' => $_POST['name'],
    ':email' => $_POST['email'],
    ':password' => $_POST['password']
  ));
  $_SESSION['success'] = 'Record Inserted';
  header('Location: index.php');
  return;
}
?>

<html>
<head>
<title>Users</title>
</head>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7"
crossorigin="anonymous">
<body>
<div class="container">
<p>Add a New User</p>
<form method="post">
  <p>Name:<input type="text" name="name" size="60"></p>
  <p>Email:<input type="text" name="email"></p>
  <p>Password:<input type="password" name="password"></p>
  <input type="submit" name="add" value="Add New"/>
  <input type="submit" name="cancel" value="Cancel"/>
</form>
</div>
</body>
</html>
