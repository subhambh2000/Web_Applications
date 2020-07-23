<!--HTML Input types
    Text
    Password
    Radio Button
    Check box
    Select/Drop-down
    Textarea
-->
<p>Many field types..</p>
<form action="more.php" method="post">
  <p> <label for="inp01">Account:</label>
      <input type="text" name="account" id="inpt01" size="40">
  </p>
  <p> <label for="inp02">Password:</label>
    <input type="password" name="password" id="inp02" size="40">
  </p>
  <p> <label for="inp03">Nick Name:</label>
    <input type="text" name="name" id="inp03" size="40">
  </p>
  <p>Preferred Time:<br/>
    <input type="radio" name="when" value="am">AM<br>
    <input type="radio" name="when" value="pm" checked>PM</p>
  <p>Classes taken:<br/>
    <input type="checkbox" name="class1" value="si502">
      SI502 - Network Tech<br>
    <input type="checkbox" name="class2" value="si539">
      SI539 - App Engine<br>
    <input type="checkbox" name="class3" value="si543">
      SI543 - Java<br>
  </p>
  <p><label for="inp06">Which soda:
    <select name="soda" id="inp06">
      <option value="0">-- Please Select --</option>
      <option value="1">Coke</option>
      <option value="2">Pepsi</option>
      <option value="3">Mountain Dew</option>
      <option value="4">Orange Juice</option>
      <option value="5">Lemonade</option>
    </select>
  </p>
  <p><label for="inp06">Which snack:
    <select name="snack" id="inp07">
      <option value="0">-- Please Select --</option>
      <option value="chips">Chips</option>
      <option value="peanuts">Peanuts</option>
      <option value="cookie">Cookie</option>
      <!-- <option value="4">Orange Juice</option>
      <option value="5">Lemonade</option> -->
    </select>
  </p>
  <p><label for="info">Tell us something about yourself:</label><br/>
    <textarea name="about" rows="10" cols="40" id="info"></textarea>
  </p>
  <p><label for="inp09">Which are awesome?<br/>
    <select multiple="multiple" name="code[]" id="inp09">
      <option value="Python">Python</option>
      <option value="css">CSS</option>
      <option value="html">HTML</option>
      <option value="php">PHP</option>
    </select>
  </p>
  <p>
    <input type="submit" name="submit" value="Submit">
    <input type="button" onclick="location.href='.';return false;" value="Escape">
  </p>
</form>
<!-- <pre>
$_POST:
<?php
print_r($_POST);
?>
<input type="button" name="back" onclick="location.href='html_input_types.php';return false;" value="Back">
</select>
</pre> -->
