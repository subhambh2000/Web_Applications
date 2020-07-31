<!-- This is the login screen
     this screen will redirect to the game.php after successfull login-->
<?php
  session_start();
  require_once "pdo.php";

  if (isset($_POST['cancel'])) {
    header("Location: index_rdir.php");
    return;
  }

  $salt = 'XyZzy12*_';

  // $failure = false;

  if (isset($_POST['email']) && isset($_POST['pass'])) {
    if (strlen($_POST['pass'])<1 || strlen($_POST['email'])<1) {
      $_SESSION['error'] = "email and password required";
      header('Location: login.php');
      return;
    }
    elseif (strpos($_POST['email'],"@") == false) {
      $_SESSION['error'] = "Email must have an at-sign (@)";
      header('Location: login.php');
      return;
    }
    else {
      $check = hash('md5',$salt.$_POST['pass']);
      $stmt = $pdo->prepare('select user_id,name from users where email=:em and password=:pw');
      $stmt->execute(array(
        ':em' => $_POST['email'], ':pw' => $check
      ));
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      if ($row !== false ) {
        $_SESSION['name'] = $row['name'];
        //$_SESSION['email'] = $_POST['email'];
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['login'] = true;
        header("Location: index_rdir.php");
        error_log("Login success ".$_POST['name']);
        return;
      }
      else {
        $_SESSION['error'] = "Incorrect password";
        error_log("Login fail ".$_POST['name']."$check");
        header('Location: login.php');
        return;
      }
    }
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Subham Bhattacharjee Login Page</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
    integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7"
    crossorigin="anonymous">
  </head>
  <body>
    <script>
    function doValidate(){
        console.log('Validating...');
        try{
            em = document.getElementById('nam').value;
            pw = document.getElementById('passrd').value;
            console.log('Validating email='+em+'and pw='+pw);
            if (em == null || em == "" || pw == null || pw == ""){
            alert("Both fields must be filled out");
            return false;
            }
            if (em.indexOf('@') == -1){
                alert('Invalid email address');
                return false;
            }
            return true;
        }
        catch(e){
        return false;
        }
        return false;
    }
    </script>
    <div class="container">
      <?php $failure = isset($_SESSION['error']) ? $_SESSION['error'] : false ?>
    <h1>Please Log In</h1>
    <?php if ($failure !== false) {
      echo '<p style="color: red;">'.htmlentities($failure)."</p>\n";
      unset($_SESSION['error']);
    } ?>
    <form method="post">
      <label for="nam">Email</label>
      <input type="text" name="email" id="nam"><br/>
      <label for="passrd">Password</label>
      <input type="password" name="pass" id="passrd"><br/>
      <input type="submit" onclick="return doValidate()" value="Log In">
      <input type="submit" name="cancel" value="Cancel">
    </form>
    </div>
  </body>
</html>
