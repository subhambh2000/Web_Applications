<?php
require_once "pdo.php";
session_start();
?>

<html lang="en" dir="ltr">
  <head>
    <title>Subham Bhattacharjee - Automobile tracker</title>
  </head>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <body>
    <div class="container">
      <h1>Welcome to Autos Database</h1>
      <!-- <p>
        <a href="login_redirect.php">Please Log In</a>
      </p>
      <p>
        Attempt to go to the <a href="view.php">view.php</a> without logging in - it should fail with an error message.
      </p> -->
      <?php
      if (isset($_SESSION['error'])) {
        echo '<p style="color: red">'.$_SESSION['error']."</p>\n";
        unset($_SESSION['error']);
      }
      if (isset($_SESSION['success'])) {
        echo '<p style="color: green">'.$_SESSION['success']."</p>\n";
        unset($_SESSION['success']);
      }
      echo('<table border="1">'."\n");
      ?>
      <?php
      $stmt = $pdo->query("select user_id,name,email,password from users");
      echo '<table border="1">'."\n";
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr><td>";
        echo (htmlentities($row['name']));
        echo "</td><td>";
        echo (htmlentities($row['email']));
        echo "</td><td>";
        echo (htmlentities($row['password']));
        echo ("</td><td>");
        // echo ('<form method="post"><input type="hidden" ');
        echo ('<a href="edit.php?user_id='.$row['user_id'].'">Edit</a> / ');
        echo ('<a href="delete.php?user_id='.$row['user_id'].'">Delete</a>');
        echo ("\n</form>\n");
        echo ("</td></tr>\n");
      }
      ?>
      </table>
      <a href="add.php">Add New</a>
    </div>
  </body>
</html>
