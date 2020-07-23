<!-- These are some of the input types
defined in HTML5 which sometimes do not work on some browsers-->
<form action="html5_input.php" method="post">
Select your favourite color:
<input type="color" name="favcolor" value="#000000"><br/>
Birthday:
<input type="date" name="bday" value="2020-06-11"><br/>
E-mail:
<input type="email" name="email"><br/>
Quantity (between 1 and 5):
<input type="number" name="quantity" min="1" max="5"><br/>
Add your homepage:
<input type="url" name="homepage"><br/>
Transportation:
<input type="flying" name="sauce"><br/>
<!--flying is not a valid input type in html 5
    whenever an invalid input type is given
    the browser automatically sets it to default text fields-->
<input type="submit" name="validate" value="Submit">
<input type="button" onclick="location.href='.';return false;" value="Back">
</form>
<pre>
<?php
  print_r($_POST);
?>
</pre>
