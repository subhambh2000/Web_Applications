<?php
  require_once "pdo.php";

  if(isset($_POST['user_id'])) {
    $sql = "delete from users where user_id = :zip";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':zip' => $_POST['user_id']));
  }
?>
<?php require_once "second.php" ?>
<p>Delete An User</p>
<form method="post">
  <p>ID to Delete: <input type="text" name="user_id"></p>
  <p><input type="submit" value="Delete"/></p>
</form>
