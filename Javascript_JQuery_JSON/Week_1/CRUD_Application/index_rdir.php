<?php
session_start();
require_once "pdo.php";
$stmt = $pdo->query('select * from profile');
$rows = $stmt->fetchALL(PDO::FETCH_ASSOC);
?>

<html lang="en" dir="ltr">
  <head>
    <title>Subham Bhattacharjee</title>
  </head>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <body>
    <div class="container">
      <h1>Subham Bhattacharjee Resume Registrations</h1>
      <?php
      if (!isset($_SESSION['login'])){ ?>
      <p>
        <a href="login.php">Please log in</a>
      </p>
      <?php
        if ($rows == false) {

        }
        else {
            //$stmt = $pdo->query("select user_id,name,email,password from users");
            echo '<table border="1">'."\n";
                  echo "<tr><td>";
                  echo "Name";
                  echo "</td><td>";
                  echo "Headline";
                  echo ("</td></tr>\n");
            foreach($rows as $row ) {
              echo "<tr><td>";
              echo ('<a href="view.php?profile_id='.$row['profile_id'].'">'.htmlentities($row['first_name']).htmlentities($row['last_name']).'</a>');
              echo "</td><td>";
              echo (htmlentities($row['headline']));
              /* echo "</td><td>";
              // echo ('<form method="post"><input type="hidden" ');
              echo ('<a href="edit.php?profile_id='.$row['profile_id'].'">Edit</a> / ');
              echo ('<a href="delete.php?profile_id='.$row['profile_id'].'">Delete</a>');*/
              echo ("</td></tr>\n");
            }?>
            </table>
 <?php } return;
     }?>
      <?php
      if (isset($_SESSION['error'])) {
        echo '<p style="color: red">'.$_SESSION['error']."</p>\n";
        unset($_SESSION['error']);
      }
      if (isset($_SESSION['success'])) {
        echo '<p style="color: green">'.$_SESSION['success']."</p>\n";
        unset($_SESSION['success']);
      }
      //echo('<table border="1">'."\n");
      ?>
      <p><a href="logout.php">Logout</a></p>
      <?php
      //$stmt = $pdo->query("select user_id,name,email,password from users");
      if ($rows == false) {

      }
      else {
      echo '<table border="1">'."\n";
            echo "<tr><td>";
            echo "Name";
            echo "</td><td>";
            echo "Headline";
            echo "</td><td>";
            echo "Actions";
            echo ("</td></tr>\n");
      foreach($rows as $row ) {
        echo "<tr><td>";
        echo ('<a href="view.php?profile_id='.$row['profile_id'].'">'.htmlentities($row['first_name']).htmlentities($row['last_name']).'</a>');
        echo "</td><td>";
        echo (htmlentities($row['headline']));
        echo "</td><td>";
        // echo ('<form method="post"><input type="hidden" ');
        echo ('<a href="edit.php?profile_id='.$row['profile_id'].'">Edit</a> ');
        echo ('<a href="delete.php?profile_id='.$row['profile_id'].'">Delete</a>');
        echo ("</td></tr>\n");
      }
      ?>
      </table>
      <?php }?>
      <a href="add.php">Add New Entry</a>
    </div>
  </body>
</html>
