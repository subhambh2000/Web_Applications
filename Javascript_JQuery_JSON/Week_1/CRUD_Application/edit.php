<?php
session_start();
require_once "pdo.php";

if(!isset($_SESSION['name'])){
  die("Not logged in");
}

if (isset($_POST['cancel'])) {
  header('Location: index_rdir.php');
  return;
}

if (isset($_REQUEST['profile_id'])){
    $profile_id = htmlentities($_REQUEST['profile_id']);

    if (isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email']) && isset($_POST['headline']) && isset($_POST['summary'])) {
        if (strlen($_POST['first_name']) < 1 || strlen($_POST['last_name']) < 1 || strlen($_POST['email']) < 1 || strlen($_POST['headline']) < 1 || strlen($_POST['summary']) < 1)
            {
                $_SESSION['status'] = "All fields are required";
                header("Location: edit.php?profile_id=" . htmlentities($_REQUEST['profile_id']));
                return;
            }

        if (strpos($_POST['email'], '@') === false)
        {
            $_SESSION['status'] = "Email address must contain @";
            header("Location: edit.php?profile_id=" . htmlentities($_REQUEST['profile_id']));
            return;
        }
    $sql = "update profile
            SET first_name = :fn, last_name = :ln, email = :em, headline = :he, summary = :su
            WHERE profile_id = :profile_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':fn' => $_POST['first_name'],
        ':ln' => $_POST['last_name'],
        ':em' => $_POST['email'],
        ':he' => $_POST['headline'],
        ':su' => $_POST['summary'],
        ':profile_id' => $profile_id
    ));
    $_SESSION['success'] = 'Profile Updated';
    header('Location: index_rdir.php');
    return;
    }

    $stmt = $pdo->prepare("
            SELECT * FROM profile
            WHERE profile_id = :pid
    ");

    $stmt->execute([
      ':pid' => $profile_id,
    ]);
    $profile = $stmt->fetch(PDO::FETCH_ASSOC);

}
?>

<?php $fn = htmlentities($profile['first_name']);
      $ln = htmlentities($profile['last_name']);
      $em = htmlentities($profile['email']);
      $he = htmlentities($profile['headline']);
      $su = htmlentities($profile['summary']); ?>
<p>Editing Profile for <?php echo $_SESSION['name']; ?></p>
<form method="post">
  <p>First Name:<input type="text" name="first_name" size="60" value="<?= $fn; ?>"></p>
  <p>First Name:<input type="text" name="last_name" size="60" value="<?= $ln; ?>"></p>
  <p>Email:<input type="text" name="email" size="30" value="<?= $em; ?>"></p>
  <p>Headline:<br/>
  <input type="text" name="headline" size="80" value="<?= $he; ?>"></p>
  <p>Summary:<br/>
  <textarea name="summary" rows="8" cols="80"><?= $su; ?></textarea></p>
  <input type="submit" value="Save"/>
  <input type="submit" name="cancel" value="Cancel"/>
</form>
