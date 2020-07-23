<!DOCTYPE html>
<html>
<head>
  <title>Subham Bhattacharjee MD5 Cracker</title>
</head>
<body>
  <h1>MD5 Cracker</h1>
  <p>This application takes an MD5 hash
    of a four digit pin and check all 10,000 possible four digit PINs
    to determine the PIN</p>
<pre>
Debug output:
<?php
  $goodText = "Not Found";
  if(isset($_GET['md5'])){
    $time_pre = microtime(true);
    $md5 = $_GET['md5'];

    $txt = "123456789";
    $show = 15;

    for ($i=0; $i < strlen($txt); $i++) {
      $ch1 = $txt[$i];

      for ($j=0; $j < strlen($txt); $j++) {
        $ch2 = $txt[$j];

        for ($k=0; $k < strlen($txt); $k++) {
          $ch3 = $txt[$k];

          for ($l=0; $l < strlen($txt); $l++) {
            $ch4 = $txt[$l];

            $ch = $ch1.$ch2.$ch3.$ch4;

            $check = hash('md5',$ch);
            if($check == $md5){
              $goodText = $ch;
              break;
            }

            if($show > 0){
              print "$check $ch\n";
              $show = $show - 1;
            }
          }
        }
      }
    }
    $time_post = microtime(true);
    print "Elasped Time: ";
    print $time_post-$time_pre;
    print "\n";
  }
?>
</pre>
<p>PIN: <?= htmlentities($goodText); ?></p>
<form>
  <input type="text" name="md5" size="60">
  <input type="submit" value="Crack md5">
</form>
<a href="index.php">Reset</a>
</body>
</html>
