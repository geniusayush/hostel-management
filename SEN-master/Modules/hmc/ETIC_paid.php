<HTML>
<HEAD>
<TITLE>ETIC-Registration</TITLE>
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
			    $db_handle=Connect_To_Server();
				$db_found=Connect_To_DB();
				$id_sub=$_POST['id_sub'];
				$id_hmc=$_SESSION['login_id'];
				ETIC_update_paid($id_sub,$id_hmc);
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
		
		$db_handle=Connect_To_Server();
		$db_found=Connect_To_DB();
		$SQL_Query="select * from ETIC ";
		$result=mysql_query($SQL_Query);
		echo "<table border='1'>";
		echo"<tr><td>Resident ID</td><td>Newspaper Name</td><td>Paid</td><td> set paid</td></tr>";
		echo"<FORM NAME='form1' METHOD='POST' ACTION='ETIC_paid.php' >";
		while($out=mysql_fetch_assoc($result))
		{
				$id=$out['id'];
				$newspaper=$out['newpaper'];
				$paid=$out['paid'];
				echo "<tr><td>$id</td><td>$newspaper</td><td>$paid</td>";
				echo "<td><INPUT TYPE='RADIO' NAME='id_sub' value=$id></td></tr>";
				
		}
		echo"</table>";
		echo "<INPUT TYPE='SUBMIT' NAME='SUBMIT1' VALUE='Paid'>";
		echo"</form>";
		
		Close_To_Server($db_handle);
		
?>
</HEAD>

<BODY>
	<FORM NAME="form1" METHOD="POST" ACTION="ETIC_paid.php" >
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
		function ETIC_update_paid($id_sub,$id_hmc)
		{
				$id=$_SESSION['login_id'];
				$SQL_Query="update ETIC set paid ='y',Payment_recv_from='$id_hmc' where id='$id_sub'";
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