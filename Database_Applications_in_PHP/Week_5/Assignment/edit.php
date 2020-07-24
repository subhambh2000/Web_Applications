<?php
require_once "pdo.php";
session_start();
if(!isset($_SESSION['name'])){
  die("Access Denied");
}
if (isset($_POST['cancel'])) {
  header('Location: index_auto.php');
  return;
}

if (isset($_POST['make']) && isset($_POST['model'])
      && isset($_POST['year']) && isset($_POST['mileage']) && isset($_POST['autos_id'])) {
  $sql = "update autos set make = :make,
          model = :model,
          year = :year,
          mileage = :mileage where autos_id = :autos_id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(array(
    ':make' => $_POST['make'],
    ':model' => $_POST['model'],
    ':year' => $_POST['year'],
    ':mileage' => $_POST['mileage'],
    ':autos_id' => $_POST['autos_id']
  ));
  $_SESSION['success'] = 'Record Updated';
  header('Location: index_autos.php');
  return;
}
elseif (strlen($_POST['make'])<1 ||
        strlen($_POST['model'])<1 ||
        strlen($_POST['year'])<1 || strlen($_POST['mileage'])<1) {
  $_SESSION['error'] = "All fields are required";
  header("Location: edit.php?autos_id=".$_REQUEST['id']);
  return;
}
$stmt = $pdo->prepare("select * from autos where autos_id = :xyz");
$stmt->execute(array( ":xyz" => $_GET['user_id']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ($row === false) {
  $_SESSION['error'] = 'Bad value for autos_id';
  header('Location: index_auto.php');
  return;
}
?>

<?php $mk = htmlentities($row['make']);
      $md = htmlentities($row['model']);
      $yr = htmlentities($row['year']);
      $ml = htmlentities($row['mileage']); ?>
<p>Edit Record</p>
<form method="post">
  <p>Make:
  <input type="text" name="make" value="<?= $mk ?>"></p>
  <p>Model:
  <input type="text" name="model" value="<?= $md ?>"></p>
  <p>Year:
    <input type="text" name="year" value="<?= $yr ?>"></p>
  <p>Mileage:
    <input type="text" name="mileage" value="<?= $ml ?>"></p>
  <input type="hidden" name="autos_id" value="<?= $row['autos_id']; ?>">
  <input type="submit" value="Update"/>
  <input type="submit" name="cancel" value="Cancel"/>
</form>
