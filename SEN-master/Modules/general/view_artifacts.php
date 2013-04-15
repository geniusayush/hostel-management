
<?php

// complaint for general users
function Connect_TO_Server()
		{
			$usernamedb="root";
			$passworddb="";
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
		}
		function Close_To_Server($db_handle)
		{
			mysql_close($db_handle);
		}


$db=Connect_To_Server();
$db_found=Connect_To_DB();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> </title>
</head>

<body>
<?php
//3/ perform database query
// for deleteing complaints.........................................................

			$result = mysql_query("select t1.* ,t2.name from activities as t1 join residents as t2 where t1.resident_id = t2.id ",$db);
			if(!$result){
					die("database selection failed:".mysql_error());
				}
echo '<table border="1">';
echo "<tr>";
	echo "<td>Name</td>";
	echo "<td>Location</td>";
	echo "<td>Issued to Resident</td>";
	
while($row = mysql_fetch_array($result)){
	echo "<tr>";
	echo "<td>" . $row["Name"] . "</td>";
	echo "<td>" . $row["location"] . "</td>";
	echo "<td>" . $row["name"] . "</td>";
	
}
echo "</table>";
?>
<?php
//5. close connection

Close_To_Server($db);


?>





</body>
</html>
