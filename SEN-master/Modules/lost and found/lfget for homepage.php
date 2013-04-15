
<?php
// this is for home page of the site lost and found
require_once ('db.php');
$db=Connect_To_Server();
$db_found=Connect_To_DB();
?>
<?php
/// this page is for getting  lost and found at home page .......................................................
 //by nikunj amipara,
	//1 create database connection
	
	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>lost and found home page </title>
</head>

<body>
<?php
//3/ perform database query


$result = mysql_query("SELECT * FROM lost_found order by date  DESC,time desc limit 0,10 ",$db);
if(!$result){
		die("database selection failed:".mysql_error());
	}
//4. use returned data
//while($row = mysql_fetch_array($result)){
//	echo $row["id"]. " ". $row["date"]."". $row["time"]. " ". $row["title"]. "<br/>";

echo '<table border="1">';
/*echo "<tr>";
	echo "<td>id</td>";
	echo "<td>Date</td>";
	echo "<td>Time</td>";
	echo "<td>Sentby</td>";
*/	
while($row = mysql_fetch_array($result)){
	echo "<tr>";
	if($row["type"]){
		echo "<td> Found</td>";
	}
	else
		echo "<td>Lost</td>";
	echo "<td>" . $row["date"] . "</td>";
	echo "<td>" . $row["time"] . "</td>";
	echo "<td>" . $row["id"] . "</td>";
	echo "<td>" . $row["object_details"] . "</td>";
	
	echo "<br/>";
}
echo "</table>"

?>
</body>
</html>
<?php
//5. close connection

mysql_close($db);


?>