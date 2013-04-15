<HTML>
<HEAD>
<TITLE>Student - Entries</TITLE>
<?PHP
		session_start();
		if(isset($_SESSION['access'])&&($_SESSION['access']=='6'))
		{
			if(isset($_POST['SUBMIT2']))
			{
						header('location:/sen/Modules/Links_temp/doctor_links.php');
			}
				
			if(isset($_POST['SUBMIT1']))
			{
			
				$login_id=$_SESSION['login_id'];
				$resident_id=$_POST['resident_id'];
				$ailment=$_POST['ailment'];
				$db_handle=Connect_To_Server();
				$db_found=Connect_To_DB();
				student_entries($login_id,$resident_id,$ailment);
				Close_To_Server($db_handle);
			}
		}
		else 
		{
			
			$_SESSION['access']=0;
			session_destroy();
			header('location:/sen/Modules/login.php');
			echo "invalid Login";
		}
		
?>
</HEAD>

<BODY>
	<FORM NAME="form2" METHOD="POST" ACTION="student_entries.php" >
	
		Resident ID : <INPUT TYPE="TEXT" NAME="resident_id"> 
		<br>
		Ailment: <INPUT TYPE="TEXT"  NAME="ailment">
		<br>
		<INPUT TYPE="SUBMIT" NAME="SUBMIT1" VALUE="Insert">
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
			echo nl2br("\n");
		}
		function Close_To_Server($db_handle)
		{
			mysql_close($db_handle);
		}
		function student_entries($login_id,$resident_id,$ailment)
		{
				$SQL_Query="select doctor_id from doctor natural join login where login_id='$login_id' ";
				$result=mysql_query($SQL_Query);
				$out=mysql_fetch_assoc($result);
				$doctor_id=$out['doctor_id'];
				$date_time=date('Y-m-d h:i:s ', time());
				$SQL_Query="INSERT INTO doctor_visit(`visit_id`, `time_date`, `doctor_id`, `resident_id`, `Ailment`) VALUES (NULL, '$date_time', '$doctor_id', '$resident_id', '$ailment')";
				$result=mysql_query($SQL_Query);
				if($result==false)
				{
						echo mysql_error();
				}
				else
				{
					echo "Successful";
				}
			
		}
?>