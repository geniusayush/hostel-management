<HTML>
<HEAD>
<TITLE>Add Artifacts</TITLE>
<?PHP
		session_start();
		if(isset($_SESSION['access'])&&($_SESSION['access']=='3'))
		{
			if(isset($_POST['SUBMIT2']))
			{
						header('location:/sen/Modules/Links_temp/hmc_convener_links.php');
			}
				
			if(isset($_POST['SUBMIT1']))
			{
			
				$name=$_POST['name'];
				$location=$_POST['location'];
				$resident_id=$_POST['resident_id'];
				$db_handle=Connect_To_Server();
				$db_found=Connect_To_DB();
				add_artifact($resident_id,$name,$location);
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
	<FORM NAME="form2" METHOD="POST" ACTION="add_artifact.php" >
	
		Name : <INPUT TYPE="TEXT" NAME="name"> 
		<br>
		Location : <INPUT TYPE="TEXT"  NAME="location">
		<br>
		ID Of the resident who has the Artifact : <INPUT TYPE="TEXT"  NAME="resident_id">
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
		function add_artifact($resident_id,$name,$location)
		{
				$SQL_Query="INSERT INTO activities (resident_id,location,Name) VALUES('$resident_id','$location','$name')";
				$result=mysql_query($SQL_Query);
				if($result==false)
				{
						if(mysql_errno()==1452)
							echo "There is No Resident with the given id";
				}
				else
				{
					echo "Successful";
				}
			
		}
?>