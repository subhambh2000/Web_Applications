<?php
  session_start();
  if(isset($_POST['where'])){
    if($_POST['where'] == '1'){
      header("Location: redir.php");
      return;
    } elseif ($_POST['where'] == '2'){
      header("Location: redir2.php?parm=123");
      return;
    } else {
      header("Location: http://www.dr-chuck.com");
      return;
    }
  }
?>
<html>
  <head>
  </head>
  <body style="font-family: sans-serif;">
    <p>I am Router Two...</p>
    <form method="post">
      <p><label for="inp9.php">Where to go? (1-3)</label>
        <input type="text" name="where" id="inp9" size="5">
        <input type="submit">
      </p> 
    </form>
  </body>
</html>
