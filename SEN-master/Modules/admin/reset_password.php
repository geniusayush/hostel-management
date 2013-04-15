<HTML>
<HEAD>
<TITLE>Change Password - Registration</TITLE>
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
				$id=$_POST['login_id'];
				$db_handle=Connect_To_Server();
				$db_found=Connect_To_DB();
				reset_password($id);
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
	<FORM NAME="form1" METHOD="POST" ACTION="reset_password.php" >
	
		Login ID :<Input Type="text" name="login_id">
		<br>
		<INPUT TYPE="SUBMIT" NAME="SUBMIT1" VALUE="Reset Password">
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
		function reset_password($id)
		{
				$SQL_Query="select count(*) as count from login where login_id='$id'";
				$result=mysql_query($SQL_Query);
				$out=mysql_fetch_assoc($result);
				if($out['count']>0)
				{
					$SQL_Query="update login set password='reset123' where login_id='$id'";
					$result=mysql_query($SQL_Query);
					if($result==false)
					{
						echo mysql_error();
						echo mysql_errno();
					}
					else 
					{
						print "Password has been Reset to reset123";
					}
				}
				else
				{
						print "The login ID does exist";
				}
		}
?>