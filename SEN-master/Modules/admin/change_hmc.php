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
				$wing=$_POST['wing'];
				$floor=$_POST['floor'];
				$db_handle=Connect_To_Server();
				$db_found=Connect_To_DB();
				change_hmc($id,$wing,$floor);
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
	<FORM NAME="form1" METHOD="POST" ACTION="change_hmc.php" >
	
		ID: <INPUT TYPE="TEXT"  NAME="resident_id">
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
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			</select>
		<br>
		<INPUT TYPE="SUBMIT" NAME="SUBMIT1" VALUE="Change">
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
		function change_hmc($id,$wing,$floor)
		{
				
				$SQL_Query="update hmc set id='$id' where floor='$floor' and wing='$wing'";
				$result=mysql_query($SQL_Query);
				if($result==false)
				{
						echo mysql_error();
				}
				else
				{
						echo "HMC Changed Successfully";
				}
				
			
		}
?>