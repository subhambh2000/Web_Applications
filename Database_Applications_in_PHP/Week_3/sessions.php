<?php
  session_start();

  if (!isset($_SESSION['pizza'])) {
    echo("<p>Session is empty</P>\n");
    $_SESSION['pizza'] = 0;
  } elseif ($_SESSION['pizza'] < 3) {
    $_SESSION['pizza'] = $_SESSION['pizza'] + 1;
    echo("<p>Added one...</p>\n");
  } else {
    session_destroy();
    session_start();
    echo("<p>Session Restart</p>\n");
  }
?>
<p><a href="sessions.php">Click Me!</a></p>
<p>Our Session ID is: <?= session_id(); ?></p>
<pre>
<?php print_r($_SESSION); ?>
</pre>
