<?php
session_start();
require_once "pdo.php";

$stmt=$pdo->query("select autos_id,make,model,year,mileage from autos");

$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Subham Bhattacharjee - Automobile tracker</title>
</head>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<body>
<div class="container">
  <h1>Welcome to Automobiles Database</h1>
  <?php
  if (isset($_SESSION['error'])) {
    echo '<p style="color: red">'.htmlentities($_SESSION['error'])."</p>\n";
    unset($_SESSION['error']);
  }
  if (isset($_SESSION['success'])) {
    echo '<p style="color: green">'.htmlentities($_SESSION['success'])."</p>\n";
    unset($_SESSION['success']);
  }
  if (!isset($_SESSION['name'])) {?>
  <p>
    <a href="login_redirect.php">Please log in</a>
  </p>
<?php } else {
    if (sizeof($rows)>0) {
      echo '<table border="1">'."\n";
      echo "<tr><td>";
      echo "Make";
      echo "</td><td>";
      echo "Model";
      echo "</td><td>";
      echo "Year";
      echo "</td><td>";
      echo "Mileage";
      echo "</td><td>";
      echo "Actions";
      echo ("</td></tr>\n");
      foreach ($rows as $row) {
        echo "<tr><td>";
        echo (htmlentities($row['make']));
        echo "</td><td>";
        echo (htmlentities($row['model']));
        echo "</td><td>";
        echo (htmlentities($row['year']));
        echo "</td><td>";
        echo (htmlentities($row['mileage']));
        echo ("</td><td>");
        echo ('<a href="edit.php?autos_id='.$row['autos_id'].'">Edit</a> / ');
        echo ('<a href="delete.php?autos_id='.$row['autos_id'].'">Delete</a>');
        echo ("</td></tr>\n");
        }
  }
  else {
    echo "No rows found";
  }
  ?>
<br>
  </table>
  <a href="add.php">Add New Entry</a><br/>
  <a href="logout.php">Logout</a>
<?php } ?>
</div>
</body>
</html>
