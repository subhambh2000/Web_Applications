<h1>Hello from Subham's HTML Page</h1>
<pre>
<p>
<?php
  echo "Hi There. \n";
  $answer = 6*7;
  $conv = "15" + 27;
  $str = "Hello ";
  echo $str."The answer is $answer,
  typecasted answer $conv ";
  echo "$answer";
  echo var_dump($answer);
?>
</p>
<?php
  echo "this is a simple string\n";
  echo "You can also have an embedded newlines in
  strings this way as it is
  okay to do\n";

  echo "This will expand: \na newline\n";

  $expand = 12;
  echo "Variables do $expand\n\n";?>
Ternary operator
<?php
  $www = 123;
  $msg = $www > 100 ? "Large" : "Small" ;
  echo "First: $msg \n";
  echo "Seconds: $msg \n";
  $msg = ($www % 2) ? "Odd" : "Even";
  echo "Third: $msg \n";
  echo "\n";
  ?>
Side Effect Assignment
<?php
  $out = "Hello";
  $out = $out." ";
  $out = $out."World";
  $out = $out."\n";
  echo $out;
  $count = 2;
  $count += 4;
  echo "Count: $count\n";
  echo "\n";?>
Casting
<?php
  $a = 56;
  $b = 12;
  $c = $a / $b;
  echo "C: $c\n";
  $d = "100" + 36.25 + TRUE; //not wise to use True in add operator
  echo "D: $d\n";
  echo "D2: ".$d."\n";
  $e = (int) 9.9 - 1;
  echo "E: $e\n";
  $f = "sam" + 25;
  echo "F: $f\n";
  $g = "sam" . 25;
  echo "G: $g\n\n";?>
Equality v/s Identity
<?php
  if (123 == "123") print("Equaltiy 1\n");
  if (123 == "100"+23) print("Equality 2\n");
  if (FALSE == "0") print("Equality 3\n");
  if ((5<6) == "2"-"1") print("Equality 4\n");
  if ((5<6) === TRUE) print("Equality 5\n\n");
?>
strpos function
<?php
  $str = "Hello World!";
  echo "First:".strpos($str,"Wo")."\n";
  echo "Second:".strpos($str,"He")."\n";
  echo "Third:".strpos($str,"ZZ")."\n";
  if (strpos($str,"He") == FALSE) echo "Wrong A\n";
  if (strpos($str,"ZZ") == FALSE) echo "Right B\n";
  if (strpos($str,"He") !== FALSE) echo "Right C\n";
  if (strpos($str,"ZZ") === FALSE) echo "Right D\n";
  print_r(FALSE);
  print FALSE;
  echo "Where were they?\n\n";
?>
Control Structures
if statement
<?php
  $x = 7;
  if ($x < 2) {
    print "Small\n";
  }
  elseif ($x < 10) {
    print "Medium\n";
  }
  else {
    print "Large\n";
  }
  print "All Done\n";
?>
while loop
<?php
  $fuel = 10;
  while ($fuel > 1) {
    print "$fuel\n";
    $fuel -= 1;
  }
?>
do while loop
<?php
  $count = 1;
  do {
    echo "$count times 5 is ".$count*5 ."\n";
  } while (++$count <= 5);
?>
for loop
<?php
  for ($i=1; $i <= 6; $i++) {
    echo "$i times 6 is ".$i*6;
    echo "\n";
  }
?>
</pre>
