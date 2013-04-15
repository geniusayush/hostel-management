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
			
				$id=$_POST['id'];
				$wing=$_POST['wing'];
				$floor=$_POST['floor'];
				$room=$_POST['room'];
				$contact=$_POST['contact'];
				$gcontact=$_POST['gcontact'];
				$db_handle=Connect_To_Server();
				$db_found=Connect_To_DB();
				change_resident($id,$wing,$floor,$room,$contact,$gcontact);
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
	<FORM NAME="form1" METHOD="POST" ACTION="Change_resident.php" >
		In case there is no change in a field Enter "unchanged"
		ID   : <INPUT TYPE="TEXT" NAME="id"> 
		<br>
		Wing : <select name="wing">
			
			<option value="unchanged">unchanged</option>
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
		Floor : <INPUT TYPE="TEXT"  NAME="floor" value="unchanged">
		<br>
		Room Number: <INPUT TYPE="NUMBER"  NAME="room" value="unchanged">
		<br>
		Contact Details : <INPUT TYPE="NUMBER"  NAME="contact" value="unchanged">
		<br>
		Guardian Contact details : <INPUT TYPE="NUMBER"  NAME="gcontact" value="unchanged">
		<br>
		
		<INPUT TYPE="SUBMIT" NAME="SUBMIT1" VALUE="Change the Values">
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
		function change_resident($id,$wing,$floor,$room,$contact,$gcontact)
		{
			$SQL_Query="select * from resident where id='$id'";
			$result=mysql_query($SQL_Query);
			$out=mysql_fetch_assoc($result);
			if($out['id']=="")
			{
				echo "Your Username was not found";
			}				
			else	
			{
				$gender=$out['gender'];
				
				if((($gender=="f")&&($wing!="j"&&wing!="k"))||$wing!="unchanged")
				{
					echo "Invalid Wing ";
				}
				else if((($gender=="m")&&($wing!="a"&&$wing!="b"&&$wing!="c"&&$wing!="d"&&$wing!="e"&&$wing!="f"&&$wing!="g"&&$wing!="h"))||$wing!="unchanged")
				{
					echo "Invalid Wing ";
				}
				else if($gender!=="m"&&$gender!="f"&&$gender!="unchanged")
				{
					echo "invalid Gender";
				}
				else
				{
					if($wing=="unchanged")
					{
							$wing=$out['wing'];
					}
					if($floor=="unchanged")
					{
							$floor=$out['floor'];
					}
					if($room=="unchanged")
					{
							$room=$out['room'];
					}
					
					if($contact=="unchanged")
					{
							$contact=$out['contact_details'];
					}
					if($gcontact=="unchanged")
					{
							$gcontact=$out['guardian_contact_details'];
					}
					$SQL_Query="update residents set wing='$wing',room='$room',floor='$floor',contact_details='$contact',guardian_contact_details='$gcontact' where id='$id' ";
					$result=mysql_query($SQL_Query);
					if($result==false)
					{
						echo mysql_error();
						echo mysql_errno();
					}
					else
					{
						
						echo "Register Successfully";
					}
				}
			}
		}
?>