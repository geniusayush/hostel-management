<?php
//this is for admin  gets input from smrec ......
/*
require_once ('db.php');
session_start();
if(!isset($_SESSION['access']) or $_SESSION['access']!= 4)
{   
	$_SESSION['access']=0;
	session_destroy();
	header('location:/sen/Modules/login.php');
}*/
//include ('sen/databasefun.php');
require_once ('db.php');
$db=Connect_To_Server();
$db_found=Connect_To_DB();
?>
<?php
	//1 create database connection
	
	
$smid1= $_POST['received_radio'];



$query1= "UPDATE `snail_mail` SET `received_status`= true WHERE snail_mail_id = $smid1  ";
//$query1="INSERT INTO `snail_mail`(`date`, `time`, `id`, `sentby`) VALUES (2013-03-27 , '06:50:50' , '201001199' ,'spped postr') ";

$result = mysql_query($query1);
				if($result==false)
				{
						echo 'some thing went wrong !!!!!!!!'. mysql_error();
				}
				else
				{	
					echo 'snail mail update added successfully for '. $smid1;
				}

?>
<?php
//5. close connection

mysql_close($db);


?>
