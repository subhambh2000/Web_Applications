<?php
  $oldguess = isset($_POST['guess']) ? $_POST['guess'] : '';
?>
<p>Guessing game...</p>
<form method="post">
  <p><label for="guess">Input Guess</label>
  <input type="text" name="guess" id="guess"
  size="40" value="<?=htmlentities($oldguess) ?>"/>
  </p>
  <input type="submit"/>
</form>

<?= $oldguess ?> <!--this is a shorter version of the following line -->
<?php echo($oldguess); ?>
<pre>
<?php
  print_r($_POST);
?>
</pre>
