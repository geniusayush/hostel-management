
<?php

// lf view for hmc floor

session_start();
if(!isset($_SESSION['access']) or $_SESSION['access']!= 2)
{   
	$_SESSION['access']=0;
	session_destroy();
	header('location:/sen/Modules/Login/login.php');
}

require_once ('db.php');
$db=Connect_To_Server();
$db_found=Connect_To_DB();
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

			//$hmcid = 'hmcg2';
			$hmcid= $_SESSION['login_id'];
			$result1 = mysql_query("SELECT * FROM hmc where login_id = '$hmcid'",$db);
			 "result".$result1;
			$row1 = mysql_fetch_array($result1);
			
			 "wing".$wing = $row1['wing'];
			 "floor".$floor = $row1['floor'];
						
			$result = mysql_query("SELECT t1.* FROM complaints AS t1 JOIN residents AS t2 ON t1.id = t2.login_id where Type = '$ty' and  t2.floor='$floor' and t2.wing = '$wing'  order by serviced ",$db);
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
	$temp = $row["complaints_id"];
	echo "<tr>";
	echo "<td>" . $row["complaints_id"] . "</td>";
	echo "<td>" . $row["id"] . "</td>";
	echo "<td>" . $row["Type"] . "</td>";
	echo "<td>" . $row["posting_date"] . "</td>";
	echo "<td>" . $row["posting_time"] . "</td>";
	echo "<td>" . $row["serviced_date"] . "</td>";
	echo "<td>" . $row["serviced_time"] . "</td>";
	echo "<td>" . $row["description"] . "</td>";
	
}

?>


</body>
</html>
<?php
//5. close connection

Close_To_Server($db);


?>