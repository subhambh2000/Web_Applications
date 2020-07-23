<?php
require_once "pdo.php";
session_start();

  if (isset($_POST['cancel'])) {
    header('Location: index_rps.php');
    return;
  }
  if (isset($_POST['make']) && isset($_POST['year']) && isset($_POST['mileage'])) {
    if (is_numeric($_POST['year']) == 0 || is_numeric($_POST['mileage']) == 0) {
        $_SESSION['error'] = "Mileage and year must be numeric";
        header('Location: add.php');
        return;
    }
    else if (strlen($_POST['make'])<1) {
      $_SESSION['error'] = "Make is required";
      header('Location: add.php');
      return;
    }

    else{
      $_SESSION['stmt'] = $pdo->prepare('insert into autos (make,year,mileage) values (:mk, :yr, :mi)');
      $_SESSION['stmt']->execute(array(
        ':mk' => $_POST['make'],
        ':yr' => $_POST['year'],
        ':mi' => $_POST['mileage'])
      );
      $_SESSION['success'] = "Record Inserted";
      header('Location: view.php');
      return;
    }
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<title>Subham Bhattacharjee's Automobile Tracker</title>
</head>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7"
crossorigin="anonymous">
<body>
<div class="container">
<h1>Tracking Autos for <?= $_SESSION['name']; ?> </h1>
<?php
if (isset($_SESSION['error'])) {
  echo '<p style="color: red;">'.$_SESSION['error']."</p>\n";
  unset($_SESSION['error']);
} ?>
<form method="post">
  <p>Make:<input type="text" name="make" size="60"></p>
  <p>Year:<input type="text" name="year"></p>
  <p>Mileage:<input type="text" name="mileage"></p>
  <input type="submit" value="Add"/>
  <input type="submit" name="cancel" value="Cancel">
</form>
</div>
</body>
</html>
