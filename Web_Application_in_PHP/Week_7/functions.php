<pre>
PHP array_functions

Built in functions
<?php
  echo strrev(".dlrow olleH");
  echo "\n";
  echo str_repeat("Hip ",2);
  echo "\n";
  echo "hooray! -> ",strtoupper("hooray!");
  echo "\n";
  echo "Length of \"intro\": ",strlen("intro");
  echo "\n"
?>

User defined functions
<?php
//functions without arguments
  function greet(){
    return "Hello";
  }
  print greet()." World\n";
//functions with arguments
  function howdy($lang='en'){ //here 'en' is the default value of argument $lang
    if($lang == 'es') return "Hola";
    if($lang == 'fr') return "Bonjour";
    return "Hello";
  }
  print howdy()." Chuck\n"; //when no parameter is passed the default value is taken as the value of the argument
  print howdy('es')." Glenn\n";
  print howdy('fr')." Sally\n";
//call by value function
  function double($alias){
    $alias = $alias * 2;
    return $alias;
  }
  $val = 10;
  $dval = double($val);
  echo "Value = $val and double value = $dval\n";
//call by reference function
function triple(&$real){
  $real = $real * 3;
}
$val = 10;
echo "Value = $val and ";
triple($val);
echo "Triple value = $val\n";
?>

Declaring a global scope variable
<?php
//try to avoid using global scope variables
// if using global variables, use long names with unique prefixes
  function dozap(){
    global $val;  //this is variable has a global scope
    $val = 100;  //for having a variable with local/normal scope the global declaration in the previous line is not wirtten
  }

  $val = 10;
  dozap();
  echo "Global val = $val\n";
?>

Coping with missing functions
<?php
  if(function_exists("array_combine")){
    echo "Function exists";
  }
  else {
    echo "Function does not exist";
  }
?>
<!-- <?php
  phpinfo();
?> -->
</pre>
