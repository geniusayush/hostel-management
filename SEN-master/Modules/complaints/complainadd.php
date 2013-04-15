<?php
// complaints can be added by hmc hmc convineer residents
session_start();
if(!isset($_SESSION['access']) or ($_SESSION['access']!= 1 and $_SESSION['access']!= 3 and $_SESSION['access']!= 2))
{   
	$_SESSION['access']=0;
	session_destroy();
	header('location:/sen/Modules/login.php');
}

if(isset($_POST['SUBMITC']))
{
  
		
		require_once("db.php");
		$db=Connect_To_Server();
		$db_found=Connect_To_DB();
		
			
		// user id get it from session veriable this needs to be done before deploying :)........
		/// temp  i am assigning it in static way...
		//$userid= '201001199';
		$userid = $_SESSION['login_id'];
		
		$type = $_POST['type'];
		$des = $_POST['description'];
		
		//echo ".................................." .$type; 
		
		$query1= "INSERT INTO `complaints`(`posting_date`, `posting_time`,`id`, `Type`, `description`) 
				  VALUES (NOW(),NOW(),$userid,'$type','$des') ";
		
		$result = mysql_query($query1);
						if($result==false)
						{
								echo 'some thing went wrong !!!!!!!!'. mysql_error();
						}
						else
						{	
							echo $_POST['type'] . "complaint added successfully for " . $userid;
						}

				//5. close connection

				mysql_close($db);

}



?>

<form action="complainadd.php" method="post">
<fieldset><legend>Post a Complaint </legend>

<select name="type">
<option value="General">General</option>
<option value="Water">Water</option>
<option value="Electrical">Electrical</option>
<option value="Furniture">Furniture</option>
</select>
<br><br>

<b>Description </b>
<input name="description" type="text" size=100><br>
<br><br>
</fieldset>
<input type="submit" name = "SUBMITC" value="Post">
<input type="reset" value= "Reset"></fieldset>
</form>


