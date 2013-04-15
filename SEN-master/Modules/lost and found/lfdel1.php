<?php
function Connect_TO_Server()
		{
			$usernamedb="root";
			$passworddb="nikunj";
			$server=$_SERVER['SERVER_ADDR'];
			$db_handle=mysql_connect($server,$usernamedb,$passworddb);
			return $db_handle; 
		}
		function Connect_TO_DB()
		{
			$database="sen";
			$db_found = mysql_select_db($database);
			if(!$db_found)
			{
				print "error in connection to database";
			}
			echo nl2br("\n");
		}
		function Close_To_Server($db_handle)
		{
			mysql_close($db_handle);
		}
?>
<?php
//include ('sen/databasefun.php');
$db=Connect_To_Server();
$db_found=Connect_To_DB();
?>
<?php
	
	
$lfid1= $_POST['lfid'];



$query1= "DELETE from `lost_found` WHERE lost_found_id = $lfid1 ";
//$query1="INSERT INTO `snail_mail`(`date`, `time`, `id`, `sentby`) VALUES (2013-03-27 , '06:50:50' , '201001199' ,'spped postr') ";

$result = mysql_query($query1);
				if($result==false)
				{
						echo 'some thing went wrong !!!!!!!!'. mysql_error();
				}
				else
				{	
					echo 'lf deleted successfully for '. $lfid1;
				}

?>
<?php
//5. close connection

mysql_close($db);


?>