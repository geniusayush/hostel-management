<?php
//this is for admin for cofirm recieved snail mail. refers smrec.php ......
/*session_start();
if(!isset($_SESSION['access']) or $_SESSION['access']!= 4)
{   
	$_SESSION['access']=0;
	session_destroy();
	header('location:/sen/Modules/login.php');
}*/
?>
<html>
<head><title>snail mail add</title></head>
<form action="smrec.php" method="post">
<fieldset><legend>receiveed Snail mail</legend>
<b>Enter student id</b>
<input name="id" type="text" size=10><br>
</fieldset>
<input type="submit" value="Go!">
<input type="reset" value="Start again"></fieldset>
</form>
</html>