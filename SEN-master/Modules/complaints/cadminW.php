
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
$db=Connect_To_Server();
$db_found=Connect_To_DB();
/// this page is for Deleting GENERAL complaints at user side.......................................................
 //by nikunj amipara,
  $ty = "Water";
	

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
if(isset($_POST['SUBMITDEL']))
	
{
			$cid = $_POST['delete_radio'];
			$row1;
			//$temp = $_POST['r'];// this is to get  u want to delete or make it servidced.......
			
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
else if(isset($_POST['SUBMITTIC']))
	
{			
				$cid = $_POST['delete_radio'];
		
				
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
echo "<form action='cadminW.php' method='post'>";
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
	echo "<td> <input type='radio' name=delete_radio value='$temp'> </td>";
	
}

?>

<input type="submit" name="SUBMITDEL" value="Delete"/>
<input type="submit" name="SUBMITTIC" value="Tick Serviced"/>

</form>





</body>
</html>
<?php
//5. close connection

Close_To_Server($db);


?>