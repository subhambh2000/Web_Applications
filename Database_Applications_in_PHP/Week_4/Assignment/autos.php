<?php
require_once "pdo.php";
$failure = false;
$succcees = false;
  if(!isset($_GET['name']) || strlen($_GET['name'])<1){
    die("Name parameter missing");
  }

  if (isset($_POST['logout'])) {
    header('Location: index_rps.php');
    return;
  }
  if (isset($_POST['make']) && isset($_POST['year']) && isset($_POST['mileage'])) {
    if (is_numeric($_POST['year']) == 0 || is_numeric($_POST['mileage']) == 0) {
        $failure = "Mileage and year must be numeric";
    }
    else if (strlen($_POST['make'])<1) {
      $failure = "Make is required";
    }

    else{
      $stmt = $pdo->prepare('insert into autos (make,year,mileage) values (:mk, :yr, :mi)');
      $stmt->execute(array(
        ':mk' => $_POST['make'],
        ':yr' => $_POST['year'],
        ':mi' => $_POST['mileage'])
      );
      $success = "Record Inserted";
    }
  }
  $stmt=$pdo->query("select auto_id,make,year,mileage from autos");
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
<h1>Tracking Autos for <?= $_GET['name']; ?> </h1>
<?php if ($failure !== false) {
  echo '<p style="color: red;">'.htmlentities($failure)."</p>\n";
}
?>
<form method="post">
  <p>Make:<input type="text" name="make" size="60"></p>
  <p>Year:<input type="text" name="year"></p>
  <p>Mileage:<input type="text" name="mileage"></p>
  <input type="submit" value="Add"/>
  <input type="submit" name="logout" value="Logout">
</form>
<h2>Automobiles</h2>
<?php
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  echo "<ul>";
  echo "<p>";
  echo "<li>";
  echo ("<!-- ".htmlentities($row['auto_id'])." -->".htmlentities($row['year'])." ".htmlentities($row['make'])." / ".htmlentities($row['mileage']));
  echo ("</ul>"."\n");
}
 ?>
</div>
</body>
</html>
