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
			
				$laptop_id=$_POST['laptop_id'];
				$resident_id=$_POST['resident_id'];
				$name_of_manu=$_POST['name_of_manu'];
				$invoice_no=$_POST['invoice_no'];
				$db_handle=Connect_To_Server();
				$db_found=Connect_To_DB();
				register_laptop($laptop_id,$resident_id,$name_of_manu,$invoice_no);
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
	<FORM NAME="form2" METHOD="POST" ACTION="register_Laptop.php" >
	
		ID of Resident: <INPUT TYPE="TEXT" NAME="resident_id"> 
		<br>
		Serial Number: <INPUT TYPE="TEXT"  NAME="laptop_id">
		<br>
		Name of Manufacturer : <INPUT TYPE="TEXT"  NAME="name_of_manu">
		<br>
		Invoice Number: <INPUT TYPE="TEXT"  NAME="invoice_no">
		<br>
		<INPUT TYPE="SUBMIT" NAME="SUBMIT1" VALUE="Register Laptop">
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
		function register_laptop($laptop_id,$resident_id,$name_of_manu,$invoice_no)
		{
				$SQL_Query="INSERT INTO laptop_registration VALUES ('$laptop_id','$resident_id','$name_of_manu','i','$invoice_no')";
				$result=mysql_query($SQL_Query);
				if($result==false)
				{
						if( mysql_errno()==1452)
							echo "Resident entry not found";
						
				}
				else
				{
							echo "Register Successfully";
				
				}
			
		}
?>