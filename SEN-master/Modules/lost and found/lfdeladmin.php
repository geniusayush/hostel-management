<?php
// lf delete for admin

session_start();
if(!isset($_SESSION['access']) or $_SESSION['access']!= 4)
{   
	$_SESSION['access']=0;
	session_destroy();
	header('location:/sen/Modules/login.php');
}

require_once ('db.php');
//include ('sen/databasefun.php');
$db=Connect_To_Server();
$db_found=Connect_To_DB();

if(isset($_POST['SUBMIT20']))
	{
			$lfid1= $_POST['delete_radio'];
			$query1= "DELETE from `lost_found` WHERE lost_found_id = $lfid1 ";
			$result = mysql_query($query1);

				if($result==false)
				{
						echo 'some thing went wrong !!!!!!!!'. mysql_error();
				}
				else
				{	
						echo 'lf deleted successfully ';
				}
	}
?>
<?php
/// this page is for getting  snail mail at user side.......................................................
 //by nikunj amipara,
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>lf del for Admin </title>
</head>

<body>
<?php
//3/ perform database query
 /// please chaek it that this need to be implemented only at admin side ...

//4. use returned data

$result = mysql_query("SELECT * FROM lost_found order by lost_found_id ;",$db);
if(!$result){
		die("database selection failed:".mysql_error());
	}
//4. use returned data
//while($row = mysql_fetch_array($result)){
//	echo $row["id"]. " ". $row["date"]."". $row["time"]. " ". $row["title"]. "<br/>";

	echo "<form action='lfdeladmin.php' method='post'>";
echo '<table border="1">';
echo "<tr>";
	echo "<td>Type</td>";
	echo "<td>ID</td>";
	echo "<td>Date</td>";
	echo "<td>Time</td>";
	echo "<td>User Id</td>";
	echo "<td>Title</td>";
	echo "<td>Place</td>";
	echo "<td>Object Details</td>";
echo "</td>";
	while($row = mysql_fetch_array($result)){
				//print_r($row);
				$temp = $row["lost_found_id"];
				echo "<tr>";
				if($row["type"]){
					echo "<td> Found</td>";
				}
				else
				{
					echo "<td>Lost</td>";
				}
				
				echo "<td>" . $row["lost_found_id"]."</td>";
				echo "<td>" . $row["date"] . "</td>";
				echo "<td>" . $row["time"] . "</td>";
				echo "<td>" . $row["id"] . "</td>";
				echo "<td>" . $row["Title"] . "</td>";
				echo "<td>" . $row["place"] . "</td>";
				echo "<td>" . $row["object_details"] . "</td>";
				echo "<td> <input type='radio' name=delete_radio value='$temp'> </td>";
						
				
	}
echo "</table>";
echo "<input type='submit' name='SUBMIT20' value='delete'>";
echo"</form>";

	
?>

</body>
</html>
<?php
//5. close connection

mysql_close($db);


?>