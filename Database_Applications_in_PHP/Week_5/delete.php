<?php
  require_once "pdo.php";
  session_start();
  if (isset($_POST['cancel'])) {
    header('Location: index_rdir.php');
    return;
  }

  if(isset($_POST['delete']) && isset($_POST['user_id'])) {
    $sql = "delete from users where user_id = :zip";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':zip' => $_POST['user_id']));
    $_SESSION['success'] = 'Record Deleted';
    header('Location: index_rdir.php');
    return;
  }
  $stmt = $pdo->prepare("select name,user_id from users where user_id = :xyz");
  $stmt->execute(array(":xyz" => $_GET['user_id']));
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  if ($row === false) {
    $_SESSION['error'] = 'Bad value for user_id';
    header('Location: index_rdir.php');
    return;
  }
?>
<p>Confirm: Deleting <?= htmlentities($row['name']); ?></p>
<form method="post"><input type="hidden" name="user_id" value="<?= $row['user_id']; ?>">
  <input type="submit" name="delete" value="Delete"/>
  <input type="submit" name="cancel" value="Cancel"/>
</form>
