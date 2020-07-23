<pre>
<?php
  class Hello {
      protected $lang; //only accessible in the class
      function __construct($lang){
          $this->lang = $lang;
      }
      function greet() {
          if($this->lang == 'fr') return 'Bonjour';
          if($this->lang == 'es') return 'Hola';
          return 'Hello';
      }
  }
  class Social extends Hello {
    function bye(){
        if($this->lang == 'fr') return 'Au revoir';
        if($this->lang == 'es') return 'Adios';
        return 'goodbye';
    }
  }
  $hi = new Social('es');
  // $hi = new Hello($_GET['lang']);
  echo $hi->greet()."\n";
  echo $hi->bye()."\n";
?>
</pre>
