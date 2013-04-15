<HTML>
<HEAD>
<TITLE>View Doctor Entries</TITLE>
<?PHP
  	session_start();
		if(isset($_SESSION['access'])&&($_SESSION['access']=='4'))
		{
			if(isset($_POST['SUBMIT2']))
			{
						header('location:/sen/Modules/Links_temp/admin_links.php');
			}
		}
		else
		{

			$_SESSION['access']=0;
			session_destroy();
			header('location:/sen/Modules/login/login.php');
			echo "invalid Login";
		}
		$db_handle=Connect_To_Server();
		$db_found=Connect_To_DB();
		view_doctor_suggestion();
		Close_To_Server($db_handle);
?>
</HEAD>

<BODY>
	<FORM NAME="form2" METHOD="POST" ACTION="view_doctor_entries.php" >
		
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
			echo nl2br("\n");
		}
		function Close_To_Server($db_handle)
		{
			mysql_close($db_handle);
		}
		function view_doctor_suggestion()
		{
				$SQL_Query="select resident_id,name,time_date,ailment,doctor_id from doctor_visit join residents on doctor_visit.resident_id=residents.id order by time_date desc";
				$result=mysql_query($SQL_Query);
				
				if($result==false)
				{
						echo mysql_error();
				}
				else
				{
						echo "<table border='1'>";
						echo"<tr><td>ID</td><td>Name of Student</td><td>Time</td><td>Date</td><td>Ailment</td><td>Doctor</td></tr>";
						while($out=mysql_fetch_assoc($result))
						{
							$name=$out['name'];
							$id=$out['resident_id'];
							$doctor=$out['doctor_id'];
							$ailment=$out['ailment'];
							$date_time=$out['time_date'];
							$date=explode(' ',$date_time);
							echo "<tr><td>$id</td><td>$name</td><td>$date[0]</td><td>$date[1]</td><td>$ailment</td><td>$doctor</td></tr>";
						}
						echo"</table>";
				}

		}
?>
