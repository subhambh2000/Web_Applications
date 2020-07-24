<?php
require_once "pdo.php";
session_start();

  if (isset($_SESSION['success'])) {
    echo('<p style="color:green">'.$_SESSION['success']."</p>\n");
    unset($_SESSION['success']);
  }

  $_SESSION['stmt']=$pdo->query("select auto_id,make,year,mileage from autos");
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
      echo '<p style="color: red">'.$_SESSION['error']."</p>\n";
      unset($_SESSION['error']);
    }
    if (isset($_SESSION['success'])) {
      echo '<p style="color: green">'.$_SESSION['success']."</p>\n";
      unset($_SESSION['success']);
    }
    ?>
    <?php
    if (!isset($_SESSION['name'])) {?>
    <p>
      <a href="login_redirect.php">Please log in</a>
    </p>
  <?php } else {
    $stmt = $pdo->query("select autos_id,model,make,year,mileage from autos");
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
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      echo "<tr><td>";
      echo (htmlentities($row['name']));
      echo "</td><td>";
      echo (htmlentities($row['email']));
      echo "</td><td>";
      echo (htmlentities($row['password']));
      echo ("</td><td>");
      echo ('<a href="edit.php?user_id='.$row['user_id'].'">Edit</a> / ');
      echo ('<a href="delete.php?user_id='.$row['user_id'].'">Delete</a>');
      echo ("\n</form>\n");
      echo ("</td></tr>\n");
    }
    ?>
    </table>
    <a href="add.php">Add New Entry</a>
    <a href="logout.php">Logout</a>
  </div>
  </body>
  </html>
