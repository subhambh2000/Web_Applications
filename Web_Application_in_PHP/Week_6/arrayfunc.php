<pre>
Array functions
<img src="array_functions.jpg" alt="array_functions" height="300px" width="500px">

Null coalesce vs Ternary operator
<?php
  $za = array();
  $za["name"] = "Subham";
  $za["course"] = "WA4E";

  echo "Null coalesce: ";
  $name = $za['name'] ?? 'not found';
  $addr = $za['addr'] ?? 'Not found';

  echo "Name = $name\t";
  echo "Addr = $addr\n";

  echo "Ternary: ";
  echo "Name = ",isset($za['name']) ? $za['name'] : 'Not found',"\n";
  // echo isset($za['addr']);
?>
Sorting using sort, ksort, asort
<?php
echo "Using sort\n"; //sorts just on the basis of value but doesnot retain the keys
$za = array();
$za["name"] = "Subham";
$za["course"] = "WA4E";
$za["topic"] = "PHP";
echo "Before\n";print_r($za);
sort($za);
echo "\nAfter\n";print_r($za);

echo "Using ksort\n"; //sorts on the basis of the key
$ks = array();
$ks["name"] = "Subham";
$ks["course"] = "WA4E";
$ks["topic"] = "PHP";
echo "Before\n";print_r($ks);
ksort($ks);
echo "\nAfter\n";print_r($ks);

echo "Using asort\n"; //sorts on the basis of the value but retains the key
$as = array();
$as["name"] = "Subham";
$as["course"] = "WA4E";
$as["topic"] = "PHP";
echo "Before\n";print_r($as);
asort($as);
echo "\nAfter\n";print_r($as);
?>

Exploding Arrays
<?php
  $inp = "This is a sentence of seven words";
  print_r($inp."\n");
  $temp = explode(' ',$inp); //space is the delimiter here
  print_r($temp);
?>
</pre>
