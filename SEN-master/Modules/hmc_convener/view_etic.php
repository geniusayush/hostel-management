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
	
			   	$db_handle=Connect_To_Server();
				$db_found=Connect_To_DB();
				etic_view();
				Close_To_Server($db_handle);
			
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
		<FORM NAME="form2" METHOD="POST" ACTION="view_etic.php" >
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
		function etic_view()
		{
				$SQL_Query="select * from ETIC";
				$result=mysql_query($SQL_Query);
				if($result==false)
				{
					echo mysql_error();
				}
				else 
				{
						echo "<table border='1'>";
						echo"<tr><td>Student_id</td><td>Newspaper</td><td>Paid</td><td>Paid_to</td>";
						while($out=mysql_fetch_assoc($result))
						{
							$id=$out['id'];
							$paid=$out['paid'];
							$newspaper=$out['newpaper'];
							$paid_to=$out['Payment_recv_from'];
							echo"<tr><td>$id</td><td>$newspaper</td><td>$paid</td><td>$paid_to</td>";
						}
						echo"</table>";
				}
				
		}
?>
