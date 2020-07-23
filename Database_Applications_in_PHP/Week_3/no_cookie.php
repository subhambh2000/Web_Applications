<!-- this program generates session without cookies -->
<?php
ini_set('session.use_cookies', '0');
ini_set('session.use_only_cookies', '0');
ini_set('session.use_trans_sid', '1');

session_start();

?>
<p><b>No Cookies for You</b></p>
<?php
  if (!isset($_SESSION['value'])) {
    echo("<p>Session is empty</p>\n");
    $_SESSION['value'] = 0;
  } elseif ($_SESSION['value'] < 3) {
    $_SESSION['value'] = $_SESSION['value'] + 1;
    echo("<p>Added one \$_SESSION['value']=".$_SESSION['value']."</p>\n");
  } else {
    session_destroy();
    session_start();
    echo("<p>Session Restarted</p>\n");
  }
?>
<p><a href="no_cookie.php">Click this Anchor Tag!</a></p>
<p>
<form action="no_cookie.php" method="post">
  <input type="submit" name="click" value="Click This Submit Button!">
</form>
</p>
<p>Our Session ID is: <?= session_id(); ?></p>
<pre>
<?php print_r($_SESSION); ?>
</pre>
