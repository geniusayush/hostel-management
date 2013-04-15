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
/// this page is for Deleting GENERAL complaints at user side.......................................................
 //by nikunj amipara,
  $ty = "Furniture";
	

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
$cid = $_POST['cid'];
$row1;
$temp = $_POST['r'];// this is to get  u want to delete or make it servidced.......
if($temp=='Delete')
{
$result1 = mysql_query(" delete from complaints where complaints_id = $cid  ",$db);
	if($result1){
		/*echo "<script type='text/javascript'> alert('complain deleted successfully')
		</script>";*/
		echo "<h1>complain deleted successfully</h1>";
		//sleep(10);
		//header('location:/sen/complaints/cadmin.php');
	}
	else{
	
		echo "<h1>error try again</h1>";
	}
}
elseif($temp=='Tick Serviced'){
	
	$result3 = mysql_query("SELECT serviced FROM complaints where complaints_id=$cid ",$db);
	if(!$result3){
		die("database selection failed:".mysql_error());
	}
	$row1 = mysql_fetch_array($result3);
	if($row1['serviced']==true){ echo "<h1> complaint is serviced already </h1>";}
	else{
		//print_r($row1);
		$result1 = mysql_query(" update complaints set serviced_date = NOW(),serviced_time=NOW(),serviced= true where complaints_id = $cid  ",$db);
		
		if($result1){
		
			echo "<h1>complain updated successfully</h1>";
			
		
		}
		else{
		
			echo "<h1>error try again</h1>";
		}
	}
}




$result = mysql_query("SELECT * FROM complaints where Type = '$ty'  order by serviced ",$db);
if(!$result){
		die("database selection failed:".mysql_error());
	}
//4. use returned data
//while($row = mysql_fetch_array($result)){
//	echo $row["snail_mail_id"]. " ". $row["date"]."". $row["time"]. " ". $row["sentby"]."<br/>";

echo '<table border="1">';
echo "<tr>";
	echo "<td>Complaint_id</td>";
	echo "<td>ID</td>";
	echo "<td>Type</td>";
	echo "<td>Posting Date</td>";
	echo "<td>Posting Time</td>";
	echo "<td>Serviced Date</td>";
	echo "<td>Serviced Time</td>";
	echo "<td>Descrption</td>";
	
while($row = mysql_fetch_array($result)){
	echo "<tr>";
	echo "<td>" . $row["complaints_id"] . "</td>";
	echo "<td>" . $row["id"] . "</td>";
	echo "<td>" . $row["Type"] . "</td>";
	echo "<td>" . $row["posting_date"] . "</td>";
	echo "<td>" . $row["posting_time"] . "</td>";
	echo "<td>" . $row["serviced_date"] . "</td>";
	echo "<td>" . $row["serviced_time"] . "</td>";
	echo "<td>" . $row["description"] . "</td>";
	
	echo "<br/>";
}

?>


<form action="cadminF1.php" method="post">
<strong>Tick Serviced <input type="radio" name="r" value="Tick Serviced" checked="checked" />
Delete..<input type="radio" name="r" value="Delete" /></strong>
<strong>
<br /> Enter Complaint Id </strong>

<input type="text" name="cid" size="10" />
<input type="submit" name="Delete"/>

</form>





</body>
</html>
<?php
//5. close connection

mysql_close($db);


?>