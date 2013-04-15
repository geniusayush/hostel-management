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
/// this page is for getting  complaints at user side.......................................................
 //by nikunj amipara,
	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>snail mail reterive </title>
</head>

<body>
<?php
//3/ perform database query
//user name wwhich has to be fatched from session array
$userid;

//temp assignment of userid need to be removed when assembled
$userid="201001199" ;
// for deleteing complaints.........................................................
$cid = $_POST['cid'];
$result1 = mysql_query(" delete from complaints where complaints_id = $cid and id = $userid ",$db);
if($result1){
	echo "complain deleted successfully";
	header('location:/sen/complaints/cgetresi.php');
}
else{
	echo "error cant not delete try agin ";
	header ('location:/sen/complaints/cgetresi.php');
}
?>

</body>
</html>
<?php
//5. close connection

mysql_close($db);


?>