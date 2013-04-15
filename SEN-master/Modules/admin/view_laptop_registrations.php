<HTML>
<HEAD>
<TITLE>Student - Entries</TITLE>
<?PHP
  	session_start();
		if(isset($_SESSION['access'])&&($_SESSION['access']=='4'))
		{
			if(isset($_POST['SUBMIT2']))
			{
						header('location:/sen/Modules/Links_temp/admin_links.php');
			}
			
			if(isset($_POST['SUBMIT4']))
			{
				$db_handle=Connect_To_Server();
				$db_found=Connect_To_DB();
				view_laptop_details();
				Close_To_Server($db_handle);
			}	
			if(isset($_POST['SUBMIT3']))
			{
				$db_handle=Connect_To_Server();
				$db_found=Connect_To_DB();
				$id=$_POST['id'];
				view_laptop_details_by_id($id);
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
	<FORM NAME="form2" METHOD="POST" ACTION="view_laptop_registrations.php" >
		ID: <INPUT TYPE="TEXT" NAME="id" >
		<br>
		<INPUT TYPE="SUBMIT" NAME="SUBMIT4" VALUE="View All">
		<br>
		<INPUT TYPE="SUBMIT" NAME="SUBMIT3" VALUE="View by ID">
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
		function view_laptop_details()
		{
				$SQL_Query="select name,name_of_manufacturer,invoice_number,resident_id,present_status from laptop_registration join residents on laptop_registration.resident_id=residents.id order by resident_id";
				$result=mysql_query($SQL_Query);
				if($result==false)
				{
						echo mysql_error();
				}
				else
				{
						echo "<table border='1'>";
						echo"<tr><td>Resident ID</td><td>Name</td><td>Invoice Number</td><td>Present Status </td><td>Name Of manufacturer</td>";
						while($out=mysql_fetch_assoc($result))
						{
							$name=$out['name'];
							$nom=$out['name_of_manufacturer'];
							$inv_no=$out['invoice_number'];
							$id=$out['resident_id'];
							$ps=$out['present_status'];
							echo "<tr><td>$id</td><td>$name</td><td>$inv_no</td><td>$ps</td><td>$nom</td>";
						}
						echo"</table>";
				}

		}
		function view_laptop_details_by_id($id)
		{
				$SQL_Query="select name,name_of_manufacturer,invoice_number,resident_id,present_status from laptop_registration join residents on laptop_registration.resident_id=residents.id where resident_id='$id' order by resident_id";
				$result=mysql_query($SQL_Query);
				if($result==false)
				{
						echo mysql_error();
				}
				else
				{
						echo "<table border='1'>";
						echo"<tr><td>Resident ID</td><td>Name</td><td>Invoice Number</td><td>Present Status </td><td>Name Of manufacturer</td>";
						while($out=mysql_fetch_assoc($result))
						{
							$name=$out['name'];
							$nom=$out['name_of_manufacturer'];
							$inv_no=$out['invoice_number'];
							$id=$out['resident_id'];
							$ps=$out['present_status'];
							echo "<tr><td>$id</td><td>$name</td><td>$inv_no</td><td>$ps</td><td>$nom</td>";
						}
						echo"</table>";
				}

		}
				
?>
