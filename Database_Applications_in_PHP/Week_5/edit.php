<?php
require_once "pdo.php";
session_start();
if (isset($_POST['cancel'])) {
  header('Location: index_rdir.php');
  return;
}
if (isset($_POST['name']) && isset($_POST['email'])
      && isset($_POST['password']) && isset($_POST['user_id'])) {
  $sql = "update users set name = :name,
          email = :email,
          password = :password where user_id = :user_id";
  $stmt = $pdo->prepare($sql);
  $stmt = $pdo->execute(array(
    ':name' => $_POST['name'],
    ':email' => $_POST['email'],
    ':password' => $_POST['password'],
    ':user_id' => $_POST['user_id']
  ));
  $_SESSION['success'] = 'Record Inserted';
  header('Location: index_rdir.php');
  return;
}
$stmt = $pdo->prepare("select * from users where user_id = :xyz");
$stmt = $pdo->execute(array( ":xyz" => $_GET['user_id']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ($row === false) {
  $_SESSION['error'] = 'Bad value for user_id';
  header('Location: index_rdir.php');
  return;
}
?>

<p><?php echo ("Edit User\n"."Name: ".htmlentities($row['name'])."\nEmail: "
                    .htmlentities($row['email'])."\nPassword: "
                    .htmlentities($row['password'])."\n"); ?></p>
<form method="post"><input type="hidden" name="user_id" value="<?= $row['user_id']; ?>">
  <input type="submit" name="update" value="Update"/>
  <input type="submit" name="cancel" value="Cancel"/>
</form>
