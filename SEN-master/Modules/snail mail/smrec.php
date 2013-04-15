<?php
//for admin refers smrec1.php  and get inputs form smrecform
require_once ('db.php');
/*
session_start();
if(!isset($_SESSION['access']) or $_SESSION['access']!= 4)
{   
	$_SESSION['access']=0;
	session_destroy();
	header('location:/sen/Modules/login.php');
}
*/
$db=Connect_To_Server();
$db_found=Connect_To_DB();

if(isset($_POST['SUBMIT20']))
	{
		$smid1= $_POST['received_radio'];



		$query1= "UPDATE `snail_mail` SET `received_status`= true WHERE snail_mail_id = $smid1  ";
		//$query1="INSERT INTO `snail_mail`(`date`, `time`, `id`, `sentby`) VALUES (2013-03-27 , '06:50:50' , '201001199' ,'spped postr') ";
		
		$result = mysql_query($query1);
				if($result==false)
				{
						echo 'some thing went wrong !!!!!!!!'. mysql_error();
				}
				else
				{	
					echo 'snail mail Received update added successfully for '. $smid1;
					echo '</html>';
				}

	}

/// this page is for getting  snail mail at admin ......................................................
 //by nikunj amipara,
	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>snail mail reterive for admin </title>
</head>

<body>
<?php
//3/ perform database query
//user name wwhich has to be fatched from session array
$userid = $_POST['id'];


//temp assignment of userid need to be removed when assembled
//$userid="201001199" ;

$result = mysql_query("SELECT * FROM snail_mail where id= $userid and received_status = false",$db);
if(!$result){
		die("database selection failed:".mysql_error());
	}
echo "<form action='smrec1.php' method='post'>";
//4. use returned data
echo '<table border="1">';
echo "<tr>";
	echo "<td>snail_mail_id</td>";
	echo "<td>date</td>";
	echo "<td>time</td>";
	echo "<td>sentby</td>";
	
while($row = mysql_fetch_array($result)){
	$temp = $row["snail_mail_id"] ;
	echo "<tr>";
	echo "<td>" . $row["snail_mail_id"] . "</td>";
	echo "<td>" . $row["date"] . "</td>";
	echo "<td>" . $row["time"] . "</td>";
	echo "<td>" . $row["sentby"] ."</td>";
	echo "<td> <input type='radio' name=received_radio value='$temp'> </td>";
	
	
	
	
	
	echo "</tr>";

}
echo "</table>";
echo '<br/>';
echo "<input type='submit' name='SUBMIT20' value='Received'>";
echo"</form>";

// this is  how admin can update status of snamil mail.

?>
</body>
</html>
<?php
//5. close connection

mysql_close($db);


?>
