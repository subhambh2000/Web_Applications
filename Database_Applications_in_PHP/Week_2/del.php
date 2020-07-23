<?php
  require_once "pdo.php";

  if(isset($_POST['delete']) && isset($_POST['user_id'])) {
    $sql = "delete from users where user_id = :zip";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':zip' => $_POST['user_id']));
  }
?>
