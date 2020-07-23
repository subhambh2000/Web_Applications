<!-- Model View Controller
      A model that defines the elements of a web applications and how they interact
      View - Produces output
      Model - Handles data
      Controller - Orchestration/Routing
-->
<!--This top part is the model
    Completely process incoming data(if any) - produces no output-->
<?php
  $oldguess = '';
  $message = false;
  if (isset($_POST['guess'])) {
    // Trick for integer/numeric parameters
    $oldguess = $_POST['guess'] + 0;
    if ($oldguess == 42) {
      $message = "Great job!";
    }
    elseif ($oldguess < 42) {
      $message = "Too low...";
    }
    elseif ($oldguess > 42) {
      $message = "Too high";
    }
  }
?>

<!-- The data that sent from the model to the view is the contest
     The controller controls:
      what to do with the model
      when to switch to the view
      what to do with the data and the context  -->

<!--This bottom part is the View
    Produces the page output-->
<html>
  <head>
  <title>A Guessing game</title>
  </head>
  <body style="font-family: san-serif;">
    <p>Guessing game...</p>
    <?php
      if ($message ) {
        echo "<p>$message</p>\n";
      }
    ?>
    <form method="post">
      <p><label for="guess">Input Guess</label>
        <input type="text" name="guess" id="guess" size="40"
        value="<?= htmlentities($oldguess) ?>"/>
      </p>
      <input type="submit"/>
    </form>
  </body>
</html>
