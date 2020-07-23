<html><head></head>
<body>
  <table border="1">
  <?php
  $stmt = $pdo->query("select user_id,name,email,password from users");
  echo '<table border="1">'."\n";
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr><td>";
    echo ($row['name']);
    echo "</td><td>";
    echo ($row['email']);
    echo "</td><td>";
    echo ($row['password']);
    echo ("</td><td>");
    echo ('<form method="post"><input type="hidden" ');
    echo ('name="user_id" value="'.$row['user_id'].'">'."\n");
    echo ('<input type="submit" value="Del" name="delete">');
    echo ("\n</form>\n");
    echo ("</td></tr>\n");
  }
  echo "</table>\n";
  ?>
</body>
</html>
