<HTML>
<HEAD>
<TITLE>Student - Entries</TITLE>
<?PHP
  	session_start();
		if(isset($_SESSION['access'])&&($_SESSION['access']=='4'))
		{
			if(isset($_POST['SUBMIT2']))
			{
						header('location:/sen/Modules/Links_temp/admin_links.php');
			}

				$db_handle=Connect_To_Server();
				$db_found=Connect_To_DB();
				view_doctor_suggestion();
				Close_To_Server($db_handle);
			
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
	<FORM NAME="form2" METHOD="POST" ACTION="view_doctor_suggestions.php" >

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
				$SQL_Query="select date_time,name,suggestion from doctor_suggestions natural join doctor order by date_time desc";
				$result=mysql_query($SQL_Query);
				
				if($result==false)
				{
						echo mysql_error();
				}
				else
				{
						echo "<table border='1'>";
						echo"<tr><td>Name of Doctor</td><td>Suggestion</td><td>Date </td><td>Time</td>";
						while($out=mysql_fetch_assoc($result))
						{
							$name=$out['name'];
							$suggestion=$out['suggestion'];
							$date_time=$out['date_time'];
							$date=explode(' ', $date_time);
							echo "<tr><td>$name</td><td>$suggestion</td><td>$date[0]</td><td>$date[1]</td>";
						}
						echo"</table>";
				}

		}
?>
