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
  if (isset($_POST['make']) && isset($_POST['year']) && isset($_POST['mileage']) && isset($_POST['model'])) {
    if (strlen($_POST['make'])<1 || strlen($_POST['model'])<1 || strlen($_POST['year'])<1 || strlen($_POST['mileage'])<1) {
      $_SESSION['error'] = "All fields are required";
      header('Location: add.php');
      return;
    }

    elseif (is_numeric($_POST['year']) == 0 is_numeric($_POST['mileage']) == 0) {
        $_SESSION['error'] = "Year must be an integer";
        header('Location: add.php');
        return;
    }

    elseif (is_numeric($_POST['mileage']) == 0){
      $_SESSION['error'] = "Mileage must be an integer";
      header('Location: add.php');
      return;
    }

    else{
      $_SESSION['stmt'] = $pdo->prepare('insert into autos (make,year,mileage,model) values (:mk, :yr, :mi, :md)');
      $_SESSION['stmt']->execute(array(
        ':mk' => $_POST['make'],
        ':yr' => $_POST['year'],
        ':mi' => $_POST['mileage'],
        ':md' => $_POST['model'])
      );
      $_SESSION['success'] = "Record Added";
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
<h1>Add a new record </h1>
<?php
if (isset($_SESSION['error'])) {
  echo '<p style="color: red;">'.$_SESSION['error']."</p>\n";
  unset($_SESSION['error']);
} ?>
<form method="post">
  <p>Make:<input type="text" name="make" size="60"></p>
  <p>Model:<input type="text" name="model" size="60"></p>
  <p>Year:<input type="text" name="year"></p>
  <p>Mileage:<input type="text" name="mileage"></p>
  <input type="submit" value="Add"/>
  <input type="submit" name="cancel" value="Cancel">
</form>
</div>
</body>
</html>
