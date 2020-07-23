<pre>
Arrays in php

Arrays with integers as indices
<?php
  $stuff = array("Hi", "There" );
  // var_dump($stuff);
  print_r($stuff);
  echo "stuff[1] is ",$stuff[1],"\n";
?>

Arrays with key for a value
<?php
$value = array("name" => "Chuck", "course" => "WA4E" );
print_r($value);
echo "value[\"course\"] is ",$value["course"],"\n";
?>

Dumping an Array
Using print_r
<?php
  $stuff = array("name" => "Subham" , "title" => "Bhattacharjee");
  print_r($stuff);
?>
Using var_dump
<?php
  $stuff = array("name" => "Subham" , "title" => "Bhattacharjee");
  var_dump($stuff);
?>

Building up an array
<?php
  $va = array();
  $va[] = "Hello";
  $va[] = "World";
  print_r($va);
?>

Looping through an an Array
<?php
  $stuff = array("name" => "Chuck", "course" => "WA4E");
  foreach ($stuff as $k => $v) {
    echo "Key: ",$k," Value: ",$v,"\n";
  }
?>

Counted loop through Array
<?php
  $stuff = array("Subham", "1851166" );
  for ($i=0; $i < count($stuff); $i++) {
    echo "I=",$i," Val=",$stuff[$i],"\n";
  }
?>

Array of Arrays
<img src="array_of_arrays.jpg" alt="unable" height="300px" width="500px">
</pre>
