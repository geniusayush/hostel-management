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
	
// user id get it from session veriable this needs to be done before deploying :)........
/// temp  i am assigning it in static way...
$userid= '201001199';


$type = $_POST['type'];
$des = $_POST['description'];

echo ".................................." .$type; 

$query1= "INSERT INTO `complaints`(`posting_date`, `posting_time`,`id`, `Type`, `description`) 
		  VALUES (NOW(),NOW(),$userid,'$type','$des') ";

$result = mysql_query($query1);
				if($result==false)
				{
						echo 'some thing went wrong !!!!!!!!'. mysql_error();
				}
				else
				{	
					echo $_POST['type'] . "complaint added successfully for " . $userid;
				}

?>
<?php
//5. close connection

mysql_close($db);


?>


