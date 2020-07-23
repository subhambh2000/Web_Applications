<?php
require_once "pdo.php";
session_start();
  if(!isset($_SESSION['name'])){
    die("Not logged in");
  }

  if (isset($_SESSION['success'])) {
    echo('<p style="color:green">'.$_SESSION['success']."</p>\n");
    unset($_SESSION['success']);
  }
  if (isset($_POST['logout'])) {
    header('Location: logout.php');
    return;
  }

  if (isset($_POST['add'])) {
    header('Location: add.php');
    return;
  }

  $_SESSION['stmt']=$pdo->query("select auto_id,make,year,mileage from autos");
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
<?php $stmt = $_SESSION['stmt']; ?>
<div class="container">
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
 <form method="post">
   <input type="submit" name="add" value="Add"/>
   <input type="submit" name="logout" value="Logout">
 </form>
</div>
</body>
</html>
