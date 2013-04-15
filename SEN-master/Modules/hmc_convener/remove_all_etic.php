<HTML>
<HEAD>
<TITLE>View ETIC</TITLE>
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
				$db_handle=Connect_To_Server();
				$db_found=Connect_To_DB();
				etic_delete_all();
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
		Are you sure you want to remove all ETIC registrations?
		<FORM NAME="form2" METHOD="POST" ACTION="remove_all_etic.php" >
		<INPUT TYPE="SUBMIT" NAME="SUBMIT1" VALUE="Yes">
		
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
		function etic_delete_all()
		{
				$SQL_Query="truncate etic";
				$result=mysql_query($SQL_Query);
				if($result==false)
				{
					echo mysql_error();
				}
				else 
				{
					header('location:/sen/Modules/Links_temp/hmc_convener_links.php');
					
				}
				
		}
?>
