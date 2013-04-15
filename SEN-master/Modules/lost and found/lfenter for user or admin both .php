
<?php

session_start();
if(!isset($_SESSION['access']) or ($_SESSION['access']!= 1 and $_SESSION['access']!=4) )
{   
	$_SESSION['access']=0;
	session_destroy();
	header('location:/sen/Modules/login.php');
}
require_once ('db.php');
$db=Connect_To_Server();
$db_found=Connect_To_DB();

if(isset($_POST['SUBMITLF']))
{
	$userid= $_SESSION['login_id'] ;
	//$userid = '201001199';
	//$type = $_POST['type'];
	//print_r ($_POST);
	$t;
	$title = $_POST['title'];
	$objd = $_POST['object_details'];
	$place = $_POST['place']; 
	if($_POST['type'] == 'lost'){ $t = 0;}
	else if ($_POST['type'] == 'found'){$t=1;}
	//echo $date . $time . $userid . $sentby1 . gettype($_POST['sentby']); 
	
	$query1= "INSERT INTO `lost_found`(`type`,`date`, `time`, `id`, `title`,`place`,`object_details`) 
				VALUES ($t,NOW() , NOW(), $userid , '$title','$place','$objd') ";
	$result = mysql_query($query1);
					if($result==false)
					{  
							echo 'some thing went wrong !!!!!!!!'. mysql_error();
					}
					else
					{	
						echo "update added successfully for " . $userid;
					}

}

?>

<form action="lfenter.php" method="post">
<fieldset><legend>Enter Lost And Found </legend>

<select name="type">
<option value="lost">Lost</option>
<option value="found">Found</option>
</select>
<br><br>

<b>Title* </b>
<input name="title" type="text" size=10><br>
<b>Place*<br></b>
<input name="place" type="text" size=10><br>
<b>Object Details </b>
<input name="object_details" type="text" size=30><br><br>
</fieldset>
<input type="submit"  name='SUBMITLF' value="Go!">
<input type="reset" value="Start again"></fieldset>
</form>
