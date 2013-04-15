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

				$suggestion=$_POST['suggestion'];
				$db_handle=Connect_To_Server();
				$db_found=Connect_To_DB();
				student_entries($suggestion,$_SESSION['login_id']);
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
	<FORM NAME="form2" METHOD="POST" ACTION="add_suggestion.php" >

		Suggestion: <INPUT TYPE="TEXT"  NAME="suggestion">
		<br>
		<INPUT TYPE="SUBMIT" NAME="SUBMIT1" VALUE="Add Suggestion">
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
		function student_entries($suggestion,$login_id)
		{
				$SQL_Query="select doctor_id from doctor natural join login where login_id='$login_id' ";
				$result=mysql_query($SQL_Query);
				$out=mysql_fetch_assoc($result);
				$doctor_id=$out['doctor_id'];
				$date_time=date('Y-m-d h:i:s ', time());
				$SQL_Query="INSERT INTO doctor_suggestions VALUES ('$doctor_id', '$suggestion','$date_time')";
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
