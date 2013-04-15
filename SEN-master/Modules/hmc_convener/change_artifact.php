<HTML>
<HEAD>
<TITLE>Change Artifact Status</TITLE>
<?PHP
  	session_start();
		if(isset($_SESSION['access'])&&($_SESSION['access']=='3'))
		{
			if(isset($_POST['SUBMIT2']))
			{
				header('location:/sen/Modules/Links_temp/hmc_convener_links.php');
			}
			$db_handle=Connect_To_Server();
			$db_found=Connect_To_DB();
			view_form();
			if(isset($_POST['SUBMIT1']))
			{
				$id=$_POST['id'];
				$location=$_POST['location'];
				change_artifact($id,$location);
			}
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
	<FORM NAME="form2" METHOD="POST" ACTION="change_artifact.php" >
		ID :<INPUT TYPE ="TEXT" NAME="id">
		<br>
		Location :<INPUT TYPE ="TEXT" NAME="LOCATION">
		<br>
		<INPUT TYPE="SUBMIT" NAME="SUBMIT1" VALUE="Change">
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
		function view_form()
		{
				$SQL_Query="select name from activities";
				$result=mysql_query($SQL_Query);
				if($result==false)
				{
						echo mysql_error();
				}
				else
				{
					echo "<FORM NAME='form1' METHOD='POST' ACTION='change_artifacts.php' >";
					echo  "	Name: <select name='name'>";
					while($out=mysql_fetch_assoc($result))
					{
						$name=$out['name'];
						echo  "<option value=$name> $name </option>";
					}
					echo "</select>";
					echo "</FORM>";
				}
			
		}
		function add_artifact($id,$location)
		{
			$SQL_Query="select name from activities";

				$result=mysql_query($SQL_Query);
				if($result==false)
				{
						echo mysql_error();
				}
				else 
				{
						
					$name=$_POST['name'];
					$SQL_Query="update activities set location='$location',resident_id='$id' where name='$name'"; 
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
				

		}
?>
