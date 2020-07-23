<pre>
<?php
  class PartyAnimal {
    function __construct(){
      echo("Constructed\n");
    }
    function something(){
        echo("Something\n");
    }
    function __destruct(){
        echo("Destructed\n");
    }
  }

  echo("__One\n");
  $x = new PartyAnimal();
  echo("__Two\n");
  $y = new PartyAnimal();
  echo("__Three\n");
  $x->something();
  echo("__The End?\n");
?>
</pre>
