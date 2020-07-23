<!-- This is the login screen
     this screen will redirect to the game.php after successfull login-->
<!-- <?php
  if (isset($_POST['cancel'])) {
    header("Location: index_rps.php");
    return;
  }

  $salt = 'XyZzy12*_';
  $stored_hash = '1a52e17fa899cf40fb04cfc42e6352f1';

  $failure = false;

  if (isset($_POST['who']) && isset($_POST['pass'])) {
    if (strlen($_POST['pass'])<1 || strlen($_POST['who'])<1) {
      $failure = "User name and password required";
    }
    elseif (strpos($_POST['who'],"@") == false) {
      $failure = "Email must have an at-sign (@)";
    }
    else {
      $check = hash('md5',$salt.$_POST['pass']);
      if ($check == $stored_hash ) {
        header("Location: autos.php?name=".urlencode($_POST['who']));
        error_log("Login success ".$_POST['who']);
        return;
      }
      else {
        $failure = "Incorrect password";
        error_log("Login fail ".$_POST['who']."$check");
      }
    }
  }
?> -->

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Subham Bhattacharjee's Login Page</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
    integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7"
    crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
    <h1>Please Log In</h1>
    <?php if ($failure !== false) {
      echo '<p style="color: red;">'.htmlentities($failure)."</p>\n";
    } ?>
    <form method="post">
      <label for="nam">User Name</label>
      <input type="text" name="who" id="nam"><br/>
      <label for="passrd">Password</label>
      <input type="password" name="pass" id="passrd"><br/>
      <input type="submit" value="Log In">
      <input type="submit" name="cancel" value="Cancel">
    </form>
    </div>
  </body>
</html>
