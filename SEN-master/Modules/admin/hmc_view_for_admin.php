
<?php

// lf hmc convever..

session_start();
if(!isset($_SESSION['access']) or $_SESSION['access']!= 4)
{   
	$_SESSION['access']=0;
	session_destroy();
	header('location:/sen/Modules/Login/login.php');
}

require_once ('db.php');
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
			$result = mysql_query("SELECT t1.*,t2.email,t2.name,t2.contact_details FROM hmc AS t1 JOIN residents AS t2 ON t1.id = t2.login_id ",$db);
			if(!$result){
					die("database selection failed:".mysql_error());
				}
//4. use returned data
//while($row = mysql_fetch_array($result)){
//	echo $row["snail_mail_id"]. " ". $row["date"]."". $row["time"]. " ". $row["sentby"]."<br/>";
echo '<table border="1">';
echo "<tr>";
	echo "<td>login_id</td>";
	echo "<td>id</td>";
	echo "<td>name</td>";
	echo "<td>floor</td>";
	echo "<td>wing</td>";
	echo "<td>Contact_details</td>";
	echo "<td>Email</td>";
	//echo "<td>Floor</td>";
	//echo "<td>Room</td>";
	
while($row = mysql_fetch_array($result)){
	echo "<tr>";
	//print_r($row);
	echo "<td>" . $row["login_id"] . "</td>";
	echo "<td>" . $row["id"] . "</td>";
	//echo "<td>" . $row["Type"] . "</td>";
	echo "<td>" . $row["name"] . "</td>";
	//echo "<td>" . $row["room"] . "</td>";
	echo "<td>" . $row["floor"] . "</td>";
	echo "<td>" . $row["wing"] . "</td>";
	echo "<td>" . $row["contact_details"] . "</td>";
	echo "<td>" . $row["email"] . "</td>";
	
}

?>



</body>
</html>
<?php
//5. close connection

Close_To_Server($db);


?>