
<?php
//this is for user ......
require_once ('db.php');
/*session_start();
if(!isset($_SESSION['access']) or $_SESSION['access']!= 1)
{   
	$_SESSION['access']=0;
	session_destroy();
	header('location:/sen/Modules/login.php');
}*/

//include ('sen/databasefun.php');
$db=Connect_To_Server();
$db_found=Connect_To_DB();
?>
<?php
/// this page is for getting  snail mail at user side.......................................................
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
$userid= $_SESSION['login_id'] ;

$result = mysql_query("SELECT * FROM snail_mail where id= $userid and received_status = false",$db);
if(!$result){
		die("database selection failed:".mysql_error());
	}
//4. use returned data
//while($row = mysql_fetch_array($result)){
//	echo $row["snail_mail_id"]. " ". $row["date"]."". $row["time"]. " ". $row["sentby"]."<br/>";

echo '<table border="1">';
echo "<tr>";
	echo "<td>Snail_mail_id</td>";
	echo "<td>Date</td>";
	echo "<td>Time</td>";
	echo "<td>Sentby</td>";
	
while($row = mysql_fetch_array($result)){
	echo "<tr>";
	echo "<td>" . $row["snail_mail_id"] . "</td>";
	echo "<td>" . $row["date"] . "</td>";
	echo "<td>" . $row["time"] . "</td>";
	echo "<td>" . $row["sentby"] ."</td>";
	
	echo "<br/>";
}

?>
</body>
</html>
<?php
//5. close connection

mysql_close($db);


?>

