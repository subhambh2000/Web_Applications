<!-- This is the login screen
     this screen will redirect to the game.php after successfull login-->
<?php
  session_start();
  if (isset($_POST['cancel'])) {
    header("Location: app.php");
    return;
  }

  $salt = 'XyZzy12*_';
  $stored_hash = '1a52e17fa899cf40fb04cfc42e6352f1';

  // $failure = false;

  if (isset($_POST['account']) && isset($_POST['pass'])) {
    unset($_SESSION['account']); //logout current user
    // if (strlen($_POST['pass'])<1 || strlen($_POST['who'])<1) {
    //   $failure = "User name and password required";
    // }
    // elseif (strpos($_POST['who'],"@") == false) {
    //   $failure = "Email must have an at-sign (@)";
    // }
    // else {
    $check = hash('md5',$salt.$_POST['pass']);
    if ($check == $stored_hash ) {
      $_SESSION['account'] = $_POST['account'];
      $_SESSION['success'] = "Logged In";
      header("Location: app.php");
      // error_log("Login success ".$_POST['who']);
      return;
    }
      else {
        $_SESSION['error'] = "Incorrect password";
        // error_log("Login fail ".$_POST['who']."$check");
        header('Location: login.php');
        return;
      }
    }
?>

<html>
  <head>
    <title>Subham Bhattacharjee's Login Page</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
    integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7"
    crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
    <h1>Please Log In</h1>
    <?php
    if (isset($_SESSION['error'])) {
      echo '<p style="color: red;">'.$_SESSION['error']."</p>\n";
      unset($_SESSION['error']);
    }
    if (isset($_SESSION['success'])){
      echo '<p style="color: red;">'.$_SESSION['success']."</p>\n";
      unset($_SESSION['error']);
    }
    ?>
    <form method="post">
      <label for="nam">Account</label>
      <input type="text" name="account" id="nam"><br/>
      <label for="passrd">Password</label>
      <input type="password" name="pass" id="passrd"><br/>
      <input type="submit" value="Log In">
      <input type="submit" name="cancel" value="Cancel">
    </form>
    </div>
  </body>
</html>
