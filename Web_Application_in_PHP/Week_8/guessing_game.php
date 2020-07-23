<!-- Incoming data validation
      Non-empty strlen($var)>0
      A number is_numeric($var)
      An email address strpos($Var,'@')>0
      or filter_var($var,FILTER_VALIDATE_EMAIL)!==false-->
<html>
  <head>
    <title>Guessing Game by Subham Bhattacharjee</title>
  </head>
  <body>
  <h1>Welcome to my guessing game</h1>
  <p>
  <?php
    if (!isset($_GET['guess'])) {
      echo "Missing guess parameter";
    }
    elseif (strlen($_GET['guess']) < 1 ) {
      echo "Your guess is too short";
    }
    elseif (!is_numeric($_GET['guess'])){
      echo "Your guess is not a number";
    }
    elseif ($_GET['guess'] < 42 ) {
      echo "Your guess is too low";
    }
    elseif ($_GET['guess'] > 42 ) {
      echo "Your guess is too high";
    }
    else {
      echo "Congratulations - You are right";
    }
  ?>
  </p>
  </body>
</html>
