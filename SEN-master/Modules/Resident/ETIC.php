<HTML>
<HEAD>
<TITLE>ETIC- Registration</TITLE>
<?PHP
		session_start();
		if(isset($_SESSION['access'])&&($_SESSION['access']=='1'))
		{
			if(isset($_POST['SUBMIT2']))
			{
						header('location:/sen/Modules/Links_temp/resident_links.php');
			}
				
			if(isset($_POST['SUBMIT1']))
			{
			    $db_handle=Connect_To_Server();
				$db_found=Connect_To_DB();
				$newspaper=$_POST['newspaper'];
				ETIC_register($newspaper);
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
	<FORM NAME="form1" METHOD="POST" ACTION="ETIC.php" >
	
		Newpaper Name : <select name="newspaper">
			<option value="The Times of India">The Times of india</option>
			<option value="The Economic Times">The Economic Times</option>
			<option value="The Times of India and The Economic Times"> Both </option>
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
		function ETIC_register($newspaper)
		{
				$id=$_SESSION['login_id'];
				$SQL_Query="INSERT INTO ETIC VALUES('$id','$newspaper','n','not paid')";
				$result=mysql_query($SQL_Query);
				if($result==false)
				{
					echo mysql_error();
				}
				else 
				{
						print "successful";
				}
		
		}
?>