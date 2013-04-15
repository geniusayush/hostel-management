<HTML>
<HEAD>
<TITLE>Change Password - Registration</TITLE>
<?PHP
		session_start();
		if(isset($_SESSION['access'])&&($_SESSION['access']=='2'))
		{
			if(isset($_POST['SUBMIT2']))
			{
						header('location:/sen/Modules/Links_temp/hmc_links.php');
			}
				
			if(isset($_POST['SUBMIT1']))
			{
				$id=$_POST['login_id'];
				if($id!=$_SESSION['login_id'])
				{
						print "You are only allowed to change your own password";
				}
				else
				{
						$oldpassword=$_POST['opassword'];
						$newpassword=$_POST['npassword'];
						$renewpassword=$_POST['renpassword'];
						if($newpassword!=$renewpassword)
						{
								print "The retyped and new password do not match";
						}
						else
						{
							$db_handle=Connect_To_Server();
							$db_found=Connect_To_DB();
							change_password($id,$oldpassword,$newpassword);
							Close_To_Server($db_handle);
						}
				}
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
	<FORM NAME="form1" METHOD="POST" ACTION="change_password.php" >
	
		Login ID :<Input Type="text" name="login_id">
		<br>
		Old Password :<Input Type="password" name="opassword">
		<br>
		New Password :<Input Type="password" name="npassword">
		<br>
		New Password :<Input Type="password" name="renpassword">
		<br>
		<INPUT TYPE="SUBMIT" NAME="SUBMIT1" VALUE="Change Password">
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
		function change_password($login_id,$oldpassword,$newpassword)
		{
				$id=$_SESSION['login_id'];
				$SQL_Query="select * from login where login_id='$login_id' and password='$oldpassword'";
				$result=mysql_query($SQL_Query);
				if($result==false)
				{
					echo mysql_error();
				}
				else 
				{
						
						if(mysql_fetch_assoc($result)==null)
						{
								print "incorrect username and password";
						}
						else 
						{
								$SQL_Query="update login set password='$newpassword' where login_id='$login_id' and password='$oldpassword'"; 
								$result=mysql_query($SQL_Query);								
								if($result==false)
								{
										print mysql_error();
								}
								else
								{
										print "successful";
								}
						}
						
				}
		
		}
?>