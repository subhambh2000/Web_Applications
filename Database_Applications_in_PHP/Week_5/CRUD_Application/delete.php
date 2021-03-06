<?php
  require_once "pdo.php";
  session_start();
  if (isset($_POST['cancel'])) {
    header('Location: index_auto.php');
    return;
  }

  if(isset($_POST['delete']) && isset($_POST['autos_id'])) {
    $sql = "delete from autos where autos_id = :zip";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':zip' => $_POST['autos_id']));
    $_SESSION['success'] = 'Record Deleted';
    header('Location: index_auto.php');
    return;
  }
  $stmt = $pdo->prepare("select make from autos where autos_id = :xyz");
  $stmt->execute(array(":xyz" => $_GET['autos_id']));
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  if ($row === false) {
    $_SESSION['error'] = 'Bad value for autos_id';
    header('Location: index_auto.php');
    return;
  }
?>
<p>Confirm: Deleting <?= htmlentities($row['make']); ?></p>
<form method="post"><input type="hidden" name="autos_id" value="<?= $_GET['autos_id']; ?>">
  <input type="submit" name="delete" value="Delete"/>
  <input type="submit" name="cancel" value="Cancel"/>
</form>
