<?php
  require_once "pdo.php";
  session_start();
  if (isset($_POST['cancel'])) {
    header('Location: index_rdir.php');
    return;
  }

  if(isset($_POST['delete']) && isset($_POST['profile_id'])) {
    $sql = "delete from profile where profile_id = :zip";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':zip' => $_POST['profile_id']));
    $_SESSION['success'] = 'Record Deleted';
    header('Location: index_rdir.php');
    return;
  }
  $stmt = $pdo->prepare("select profile_id,first_name,last_name from profile where profile_id = :xyz");
  $stmt->execute(array(":xyz" => $_GET['profile_id']));
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  if ($row === false) {
    $_SESSION['errors'] = "Could not load profile";
    header('Location: index_rdir.php');
    return;
  }
?>
<p>Deleting Profile</p>
<p>First Name:  <?= htmlentities($row['first_name']); ?></p>
<p>Last Name:  <?= htmlentities($row['last_name']); ?></p>
<form method="post"><input type="hidden" name="profile_id" value="<?= $row['profile_id']; ?>">
  <input type="submit" name="delete" value="Delete"/>
  <input type="submit" name="cancel" value="Cancel"/>
</form>
