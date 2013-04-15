<HTML>
<HEAD>
<TITLE>Registration- Reisdents</TITLE>
<?PHP
		session_start();
		if(isset($_SESSION['access'])&&($_SESSION['access']=='4'))
		{
			if(isset($_POST['SUBMIT2']))
			{
						header('location:/sen/Modules/Links_temp/admin_links.php');
			}

			if(isset($_POST['SUBMIT1']))
			{

				$doctor_id=$_POST['doctor_id'];
				$login_id=$_POST['login_id'];
				$password=$_POST['password'];
				$name=$_POST['name'];
				$db_handle=Connect_To_Server();
				$db_found=Connect_To_DB();
				register_doctor($login_id,$doctor_id,$password,$name);
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
	<FORM NAME="form2" METHOD="POST" ACTION="register_doctor.php" >
	
		Login ID   : <INPUT TYPE="TEXT" NAME="login_id"> 
		<br>
		Doctor ID: <INPUT TYPE="TEXT"  NAME="doctor_id">
		<br>
		Password : <INPUT TYPE="password"  NAME="password" value="reset123">
		<br>
		Name: <INPUT TYPE="TEXT"  NAME="name">
		<br>
		<INPUT TYPE="SUBMIT" NAME="SUBMIT1" VALUE="Register Doctor">
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
		function register_doctor($login_id,$doctor_id,$password,$name)
		{
				$access=6;
				$SQL_Query="INSERT INTO login VALUES ('$login_id','$password','$access')";
				$result=mysql_query($SQL_Query);
				if($result==false)
				{
						echo mysql_error();
				}
				else
				{
					$SQL_Query="INSERT INTO doctor VALUES ('$doctor_id','$name','n','$login_id')";
					$result=mysql_query($SQL_Query);
					if($result==false)
					{
							echo mysql_error();
							$SQL_Query="delete from login where login_id='$login_id'";
							$result=mysql_query($SQL_Query);

					}
					else
					{
							echo "Registered Doctor Successfully";
					}
				}

		}
?>
