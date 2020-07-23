<!-- a skeleton(demo) for showing the use of require and require_once-->
<?php
// include and include_once do the same thing but don't blow up if the files are missing
require "top.php"; //pulls in the file written here but may blow up if the file is missing
require "nav.php";
?>
<div id="container">
<iframe
height="4600" width="100%" frameborder="0"
marginwidth="0" marginheight="0" scrolling="auto" src="software.php">
</iframe>
</div>
<?php
require_once "foot.php"; //pulls the file but only once
?>
