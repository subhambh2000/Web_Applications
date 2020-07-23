<?php
  require_once "pdo.php";

  if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {
    $sql = "insert into users (name,email,password) values (:name,:email,:password)";
    // echo("<pre>\n".$sql."\n</pre>\n");
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
      ':name' => $_POST['name'],
      ':email' => $_POST['email'],
      ':password' => $_POST['password']
    ));
  }
?>
<?php
  require_once "second.php";
?>
<html>
  <head></head>
  <body>
    <p>Add a New User</p>
    <form method="post">
      <p>Name:<input type="text" name="name" size="40"></p>
      <p>Email:<input type="text" name="email"></p>
      <p>Password:<input type="password" name="password"></p>
      <p><input type="submit" value="Add New"/></p>
    </form>
  </body>
</html>
