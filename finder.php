<?php
$user=$_POST["inut"];
$hash=md5($user);
print "$user $hash";
?>
<html>
<form action="<?php $_PHP_SELF ?>" method="POST">

<input type="text" name="inut">
<input type="submit" name="submit">

</form>



</html>
