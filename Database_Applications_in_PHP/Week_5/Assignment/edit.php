<?php
session_start();
require_once "pdo.php";
if(!isset($_SESSION['name'])){
  die("Access Denied");
}
if (isset($_POST['cancel'])) {
  header('Location: index_auto.php');
  return;
}

if (isset($_POST['make']) && isset($_POST['model'])
      && isset($_POST['year']) && isset($_POST['mileage'])
      && isset($_POST['autos_id'])) {
  if (!is_numeric($_POST['year']) || !is_numeric($_POST['mileage'])) {
        $_SESSION['error'] = 'Mileage and year must be numeric';
        header("Location: edit.php?autos_id=".htmlentities($_REQUEST['autos_id']));
        return;
    } elseif (strlen($_POST['make'])<1 ||
            strlen($_POST['model'])<1 ||
            strlen($_POST['year'])<1 || strlen($_POST['mileage'])<1) {
        $_SESSION['error'] = 'All fields are required';
        header("Location: edit.php?autos_id=".htmlentities($_REQUEST['autos_id']));
        return;
    }
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
    ':autos_id' => $_GET['autos_id']
  ));
  $_SESSION['success'] = 'Record Edited';
  header('Location: index_auto.php');
  return;
}

$stmt = $pdo->prepare("select * from autos where autos_id = :xyz");
$stmt->execute(array( ":xyz" => $_GET['autos_id']));
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
<?php
if (isset($_SESSION['error'])) {
    echo '<p style="color:red">' . $_SESSION['error'] . "</p>\n";
    unset($_SESSION['error']);
} ?>
<form method="post">
  <p>Make:
  <input type="text" name="make" value="<?= $mk ?>"></p>
  <p>Model:
  <input type="text" name="model" value="<?= $md ?>"></p>
  <p>Year:
    <input type="text" name="year" value="<?= $yr ?>"></p>
  <p>Mileage:
    <input type="text" name="mileage" value="<?= $ml ?>"></p>
  <input type="hidden" name="autos_id" value="<?= $_GET['autos_id']; ?>">
  <input type="submit" value="Update"/>
  <input type="submit" name="cancel" value="Cancel"/>
</form>
