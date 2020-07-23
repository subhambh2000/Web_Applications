<?php
  if(!isset($_GET['name']) || strlen($_GET['name'])<1){
    die("Name parameter missing");
  }

  if (isset($_POST['logout'])) {
    header('Location: index_rps.php');
    return;
  }

  $name = array("Rock","Paper","Scissors");
  $human = isset($_POST['human']) ? $_POST['human']+0 : -1;

  $computer = rand(0,2);

  function check($computer,$human){
    if ($human == $computer) return "Tie";
    elseif ($human == 0){
      if ($computer == 1) {
        return "You Lose";
      }
      else {
        return "You Win";
      }
    }
    elseif ($human == 1)
    if ($computer == 2) {
      return "You Lose";
    }
    else {
      return "You Win";
    }
    elseif ($human == 2){
      if ($computer == 0) return "you Lose";
      else return "You Win";
    }
    return false;
  }
  $result = check($computer,$human);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<title>Subham Bhattacharjee's Rock, Paper, Scissors</title>
</head>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7"
crossorigin="anonymous">
<body>
<div class="container">
<h1>Rock Paper Scissors</h1>
<?php if (isset($_REQUEST['name'])){
echo "Welcome: ";
echo htmlentities($_REQUEST['name']);
echo "</p>\n";
}
?>
<form method="post">
<select name="human">
<option value="-1">Select</option>
<option value="0">Rock</option>
<option value="1">Paper</option>
<option value="2">Scissors</option>
<option value="3">Test</option>
</select>
<input type="submit" value="Play">
<input type="submit" name="logout" value="Logout">
</form>

<pre>
<?php
if ($human == -1) {
print "Please select a strategy and press Play.";
}
elseif ($human == 3) {
for ($c=0; $c < 3; $c++) {
for ($h=0; $h < 3; $h++) {
$r = check($c,$h);
print ("Human=$name[$h] Computer=$name[$c] Result=$r\n");
}
}
}
else print "Your Play=$name[$human] Computer Play=$name[$computer] Result=$result";
?>
</pre>
</div>
</body>
</html>
