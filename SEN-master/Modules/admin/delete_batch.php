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
				$batch=$_POST['batch'];
				$program=$_POST['program'];
				$db_handle=Connect_To_Server();
				$db_found=Connect_To_DB();
				delete_batch($batch,$program);
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
	<FORM NAME="form1" METHOD="POST" ACTION="delete_batch.php" >

		Program   : <INPUT TYPE="TEXT" NAME="program"> 
		<br>
		Batch : <INPUT TYPE="NUMBER"  NAME="Batch">
		<br>
		
		<INPUT TYPE="SUBMIT" NAME="SUBMIT1" VALUE="Delete Batch">
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
		function delete_batch($batch,$program)
		{
			$SQL_Query="delete from resident where batch='$batch' and program='$program'";
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
?>