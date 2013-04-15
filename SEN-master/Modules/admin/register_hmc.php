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
			
				$id=$_POST['resident_id'];
				$login_id=$_POST['login_id'];
				$password=$_POST['password'];
				$wing=$_POST['wing'];
				$floor=$_POST['floor'];
				$db_handle=Connect_To_Server();
				$db_found=Connect_To_DB();
				register_hmc($login_id,$id,$wing,$floor,$password);
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
	<FORM NAME="form1" METHOD="POST" ACTION="register_hmc.php" >
	
		Login ID   : <INPUT TYPE="TEXT" NAME="login_id"> 
		<br>
		Student ID: <INPUT TYPE="TEXT"  NAME="resident_id">
		<br>
		Password : <INPUT TYPE="password"  NAME="password">
		<br>
		Wing : <select name="wing">
			<option value="a">A</option>
			<option value="b">B</option>
			<option value="c">C</option>
			<option value="d">D</option>
			<option value="e">E</option>
			<option value="f">F</option>
			<option value="g">G</option>
			<option value="h">H</option>
			<option value="j">J</option>
			<option value="k">K</option>
			</select>
		<br>
		Floor :<select name="floor">
			<option value="0">0</option>
			<option value="1">1</option>
			<option value="2">2</option>
			</select>
		<br>
		<INPUT TYPE="SUBMIT" NAME="SUBMIT1" VALUE="REGISTER">
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
		function register_hmc($login_id,$id,$wing,$floor,$password)
		{
				$access=2;
				$SQL_Query="INSERT INTO login VALUES ('$login_id','$password','$access')";
				$result=mysql_query($SQL_Query);
				if($result==false)
				{
						echo mysql_error();
				}
				else
				{
					$SQL_Query="INSERT INTO hmc VALUES ('$id','$wing','$floor','$login_id')";
					$result=mysql_query($SQL_Query);
					if($result==false)
					{
							echo mysql_error();
							$SQL_Query="delete from login where login_id='$login_id'";
							$result=mysql_query($SQL_Query);
						
					}
					else
					{
							echo "Register Successfully";
					}
				}
			
		}
?>