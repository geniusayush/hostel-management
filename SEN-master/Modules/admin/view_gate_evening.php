<HTML>
<HEAD>
<TITLE>View Gate Evening</TITLE>
<?PHP
  	session_start();
		if(isset($_SESSION['access'])&&($_SESSION['access']=='4'))
		{
			if(isset($_POST['SUBMIT2']))
			{
						header('location:/sen/Modules/Links_temp/admin_links.php');
			}
			
			if(isset($_POST['SUBMIT4']))
			{
				$db_handle=Connect_To_Server();
				$db_found=Connect_To_DB();
				view_evening_entry();
				Close_To_Server($db_handle);
			}	
			if(isset($_POST['SUBMIT3']))
			{
				$db_handle=Connect_To_Server();
				$db_found=Connect_To_DB();
				$id=$_POST['id'];
				view_evening_by_id($id);
				Close_To_Server($db_handle);
			}
		}
		else
		{

			$_SESSION['access']=0;
			session_destroy();
			header('location:/sen/Modules/login/login.php');
			echo "invalid Login";
		}

?>
</HEAD>

<BODY>
	<FORM NAME="form2" METHOD="POST" ACTION="view_gate_evening.php" >
		ID: <INPUT TYPE="TEXT" NAME="id" >
		<br>
		<INPUT TYPE="SUBMIT" NAME="SUBMIT4" VALUE="View All">
		<br>
		<INPUT TYPE="SUBMIT" NAME="SUBMIT3" VALUE="View by ID">
		<br>
		<INPUT TYPE="SUBMIT" NAME="SUBMIT2" VALUE="Go Back">
	</FORM>


</BODY>

</HTML>


<?PHP
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
		function view_evening_entry()
		{
				$SQL_Query="select resident_id,name,time_date,entry_exit from gate_evening join residents on gate_evening.resident_id=residents.id order by time_date";
				$result=mysql_query($SQL_Query);
				if($result==false)
				{
						echo mysql_error();
				}
				else
				{
						echo "<table border='1'>";
						echo"<tr><td>Resident ID</td><td>Name</td><td>Date</td><td>Time </td><td>Entry/Exit</td></tr>";
						while($out=mysql_fetch_assoc($result))
						{
							$name=$out['name'];
							$entry=$out['time_date'];
							$id=$out['resident_id'];
							$entry_datetime=explode(' ',$entry);
							if($out['entry_exit']=='o')
							{
								$io='exit';
							}
							else if($out['entry_exit']=='i')
							{
									$io='entry';
							}
							echo "<tr><td>$id</td><td>$name</td><td>$entry_datetime[0]</td><td>$entry_datetime[1]</td><td>$io</td></tr>";
						}
						echo"</table>";
				}

		}
		function view_evening_by_id($id)
		{		
				$SQL_Query="select resident_id,name,time_date,entry_exit from gate_evening join residents on gate_evening.resident_id=residents.id where id='$id' order by time_date ";
				$result=mysql_query($SQL_Query);
				if($result==false)
				{
						echo mysql_error();
				}
				else
				{
						echo "<table border='1'>";
						echo"<tr><td>Resident ID</td><td>Name</td><td>Date</td><td>Time </td><td>Entry/Exit</td></tr>";
						while($out=mysql_fetch_assoc($result))
						{
							$name=$out['name'];
							$entry=$out['time_date'];
							$id=$out['resident_id'];
							$entry_datetime=explode(' ',$entry);
							if($out['entry_exit']=='o')
							{
								$io='exit';
							}
							else if($out['entry_exit']=='i')
							{
									$io='entry';
							}
							echo "<tr><td>$id</td><td>$name</td><td>$entry_datetime[0]</td><td>$entry_datetime[1]</td><td>$io</td></tr>";
						}
						echo"</table>";
				}
		}
?>
