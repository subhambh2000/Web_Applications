<p>Guessing game</p>
<!-- When using post, the parameters are not visible in the url
when using get, the parameters are visible in the url -->
<!--get has an upper limit of the number of bytes for parameters and values
    web search spiders generally follow GET urls and not POST urls -->
<form method="post">
  <p><label for="guess">Input Guess</label>
  <input type="text" name="guess" size="40" id="guess"/></p>
  <input type="submit"/>
</form>
<pre>
$_POST:
<?php
  print_r($_POST); //post is used when creating or modifying data
?>
$_GET:
<?php
  print_r($_GET); //get is used when searching or reading data
?>
<img src="get_vs_post.png" alt="get_vs_post" height="300px" width="500px">
</pre>
