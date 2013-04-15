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
			
				$id=$_POST['id'];
				$name=$_POST['name'];
				$contact=$_POST['contact'];
				$password=$_POST['password'];
				$repassword=$_POST['repassword'];
				
				
				if($password!=$repassword)
				{
					print "The passwords do not match";
				}
				else
				{
					$db_handle=Connect_To_Server();
					$db_found=Connect_To_DB();
					register_admin($id,$name,$contact,$password);
					Close_To_Server($db_handle);
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
	<FORM NAME="form2" METHOD="POST" ACTION="register_admin.php" >
	
		ID : <INPUT TYPE="TEXT" NAME="id"> 
		<br>
		Name : <INPUT TYPE="TEXT"  NAME="name">
		<br>
		Contact Number : <INPUT TYPE="TEXT"  NAME="contact">
		<br>
		Password : <INPUT TYPE="password"  NAME="password">
		<br>
		Re-type Password :<INPUT TYPE="password"  NAME="repassword">
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
		function register_admin($id,$name,$contact,$password)
		{
				
				
				$access="4";
				$SQL_Query="INSERT INTO login VALUES ('$id','$password','$access')";
				$result=mysql_query($SQL_Query);
				if($result==false)
				{
						echo mysql_error();
				}
				else
				{
					$SQL_Query="INSERT INTO admin(id,name,contact,login_id) VALUES ('$id','$name','$contact','$id')";
					$result=mysql_query($SQL_Query);
					if($result==false)
					{
							echo mysql_error();
							$SQL_Query="delete from login where login_id='$id'";
							$result=mysql_query($SQL_Query);
						
							echo mysql_error();
					}
					else
					{
						echo "Register Successfully";
					}
				}
			
		}
?>