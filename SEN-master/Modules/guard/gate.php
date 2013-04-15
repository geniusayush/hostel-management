<HTML>
<HEAD>
<TITLE>Gate</TITLE>
<?PHP
		session_start();
		if(isset($_SESSION['access'])&&($_SESSION['access']=='5'))
		{
			if(isset($_POST['SUBMIT7']))
			{
						header('location:/sen/Modules/Links_temp/guard_links.php');
			}
			if(isset($_POST['SUBMIT1']))
			{
			
				$resident_id=$_POST['resident_id'];
				$db_handle=Connect_To_Server();
				$db_found=Connect_To_DB();
				out_evening($resident_id);
				Close_To_Server($db_handle);
			}
			if(isset($_POST['SUBMIT2']))
			{
			
				$resident_id=$_POST['resident_id'];
				$db_handle=Connect_To_Server();
				$db_found=Connect_To_DB();
				in_evening($resident_id);
				Close_To_Server($db_handle);
			}
			if(isset($_POST['SUBMIT3']))
			{
			
				$resident_id=$_POST['resident_id'];
				$purpose=$_POST['purpose'];
				$db_handle=Connect_To_Server();
				$db_found=Connect_To_DB();
				out_leave($resident_id,$purpose);
				Close_To_Server($db_handle);
			}
			if(isset($_POST['SUBMIT4']))
			{
				$resident_id=$_POST['resident_id'];
				$db_handle=Connect_To_Server();
				$db_found=Connect_To_DB();
				in_leave($resident_id);
				Close_To_Server($db_handle);
			}
			if(isset($_POST['SUBMIT20']))
			{
				$resident_id=$_POST['resident_id'];
				$db_handle=Connect_To_Server();
				$db_found=Connect_To_DB();
				$rid=$_SESSION['rid'];
				laptop_in($rid);
				Close_To_Server($db_handle);
			}
			if(isset($_POST['SUBMIT21']))
			{
				$resident_id=$_POST['resident_id'];
				$db_handle=Connect_To_Server();
				$db_found=Connect_To_DB();
				$rid=$_SESSION['rid'];
				laptop_out($rid);
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
	<FORM NAME="form2" METHOD="POST" ACTION="gate.php" >
	
		Resident ID   : <INPUT TYPE="TEXT" NAME="resident_id"> 
		<br>
		Purpose (Only applicable if taking leave): <INPUT TYPE="TEXT" NAME="purpose" value="home"> 
		<br>
		<INPUT TYPE="SUBMIT" NAME="SUBMIT1" VALUE="Go Out After 7 P.M.">
		<br>
		<INPUT TYPE="SUBMIT" NAME="SUBMIT2" VALUE="Come in After 7 P.M.">
		<br>
		<INPUT TYPE="SUBMIT" NAME="SUBMIT3" VALUE="Taking a leave">
		<br>
		<INPUT TYPE="SUBMIT" NAME="SUBMIT4" VALUE="Coming Back from leave">
		<br>
		<INPUT TYPE="SUBMIT" NAME="SUBMIT5" VALUE="Taking Laptop Out">
		<br>
			<?php
		
							
					if(isset($_POST['SUBMIT5']))
					{
						$resident_id=$_POST['resident_id'];
						$db_handle=Connect_To_Server();
						$db_found=Connect_To_DB();
						$in_out='out';
						view_laptop_details($resident_id,$in_out);
						Close_To_Server($db_handle);
					}
		
		
			?>
		<INPUT TYPE="SUBMIT" NAME="SUBMIT6" VALUE="Bringing Laptop In">
		
			<?php
		
							
					if(isset($_POST['SUBMIT6']))
					{
						$resident_id=$_POST['resident_id'];
						$db_handle=Connect_To_Server();
						$db_found=Connect_To_DB();
						$in_out='in';
						view_laptop_details($resident_id,$in_out);
						Close_To_Server($db_handle);
					}
			?>
		<?php view_form(); ?>
		<br>
		<INPUT TYPE="SUBMIT" NAME="SUBMIT7" VALUE="Go Back">
		
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
		function out_evening($residentid)
		{
				$date_time=date('Y-m-d h:i:s ', time());
				$SQL_Query="INSERT INTO gate_evening ( resident_id , time_date, entry_exit) VALUES ('$residentid','$date_time','o') ";
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
		
		function in_evening($residentid)
		{
				$date_time=date('Y-m-d h:i:s ', time());
				$SQL_Query="INSERT INTO gate_evening ( resident_id , time_date, entry_exit) VALUES ('$residentid','$date_time','i') ";
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
		function out_leave($residentid,$purpose)
		{
				$date_time=date('Y-m-d h:i:s ', time());
				
				$SQL_Query="INSERT INTO gate_leave ( resident_id , exit_time_date,purpose) VALUES ('$residentid','$date_time','$purpose') ";
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
		
		function in_leave($residentid)
		{
				
				$SQL_Query="select leave_id from gate_leave where resident_id='$residentid' and entry_time_date is NULL ";
				$result=mysql_query($SQL_Query);
				
				if($result==false)
				{
						echo mysql_error();
				}
				else
				{
					
					$out=mysql_fetch_assoc($result);
					if($out['leave_id']=="")
					{
						echo "Your entry was not found . Please first exit and then Enter";
					}
					else
					{
						$leave_id=$out['leave_id'];
						$date_time=date('Y-m-d h:i:s ', time());
						$SQL_Query="update gate_leave set entry_time_date='$date_time' where leave_id='$leave_id' ";
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
		}
		
		function view_laptop_details($resident_id,$in_out)
		{
				
				$SQL_Query="select name,name_of_manufacturer,invoice_number from laptop_registration join residents on laptop_registration.resident_id=residents.id where resident_id='$resident_id' ";
				$result=mysql_query($SQL_Query);
				
				if($result==false)
				{
						echo mysql_error();
				}
				else
				{
						echo "<FORM NAME='form3' METHOD='POST' ACTION='gate.php' >";
						echo "<table border='1'>";
						echo"<tr><td>Resident ID</td><td>Name</td><td>Laptop Invoice Number</td><td>Manufacturer</td>";
						while($out=mysql_fetch_assoc($result))
						{
							$inv_no=$out['invoice_number'];
							$name=$out['name'];
							$nom=$out['name_of_manufacturer'];
							echo "<tr><td>$resident_id</td><td>$name</td><td>$inv_no</td><td>$nom</td>";
							echo "";
						}
						echo"</table>";
						echo "<br>";
						if($in_out=='in')
						{
							echo "<INPUT TYPE='SUBMIT' NAME='SUBMIT20' VALUE='Confirm'>";
						}
						if($in_out=='out')
						{
							echo "<INPUT TYPE='SUBMIT' NAME='SUBMIT21' VALUE='Confirm'>";
						}
						echo "<INPUT TYPE='SUBMIT' NAME='SUBMIT22' VALUE='Wrong Invoice Number'>";
						echo "<br>";
						echo "</form>";
						$_SESSION['rid']=$resident_id;
						
				}
		}
		function laptop_in($id)
		{
				
				$date_time=date('Y-m-d h:i:s ', time());
				$SQL_Query="insert into gate_laptop_entry (resident_id,entry_time_date) values('$id','$date_time') ";
				$result=mysql_query($SQL_Query);
				if($result==false)
				{
						echo mysql_error();
						if(mysql_errno()=='1064')
						{
							echo "The student with this id has not registered his laptop";
						}
				}
				else
				{
						$SQL_Query="update laptop_registration set present_status='i' where resident_id='$id'";
						$result=mysql_query($SQL_Query);
						if($result==true)
						{
							echo "in Successful";
						}
				}
		}
		function laptop_out($id)
		{
				
				$SQL_Query="select resident_id from gate_laptop_entry where resident_id='$id' and exit_time_date is NULL";
				$result=mysql_query($SQL_Query);			
				if($result==false)
				{
						echo mysql_error();
				}
				else
				{
				
					$out=mysql_fetch_assoc($result);
					if($out['resident_id']=="")
					{
						echo "Your entry was not found . Please first Enter and then Exit";
					}		
					else
					{
							$date_time=date('Y-m-d h:i:s ', time());
							$SQL_Query="update gate_laptop_entry set exit_time_date='$date_time' where resident_id='$id' and exit_time_date is NULL";
							$result=mysql_query($SQL_Query);
							$SQL_Query="update laptop_registration set present_status='o' where resident_id='$id'";
							$result=mysql_query($SQL_Query);
							echo "out Successful";
					}
				}
		}
		function dhobi_status_in($dhobi_id)
		{
				
				$SQL_Query="update dhobi_status set present='i' where dhobi_id='$dhobi_id' ";
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
		function dhobi_status_out($dhobi_id)
		{
				
				$SQL_Query="update dhobi_status set present='o' where dhobi_id='$dhobi_id' ";
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
		function view_form()
		{
				$db_handle=Connect_To_Server();
				$db_found=Connect_To_DB();
				$SQL_Query="select dhobi_id,name from dhobi_status";
				$result=mysql_query($SQL_Query);
				if($result==false)
				{
						echo mysql_error();
				}
				else
				{
				//	echo "<FORM NAME='form3' METHOD='POST' ACTION='gate.php' >";
					echo  "	Name: <select name='dhobi_id'>";
				
					while($out=mysql_fetch_assoc($result))
					{
						$name=$out['name'];
						$dhobi_id=$out['dhobi_id'];
						echo  "<option value=$dhobi_id> $dhobi_id : $name </option>";
					}
	
					echo "</select>";
					echo "<br>";
					echo "<input type='SUBMIT' NAME='SUBMIT10' VALUE='Dhobi Enter' >";
					echo "<br>";
					echo "<input type='SUBMIT' NAME='SUBMIT11' VALUE='Dhobi Exit' >";
					
				}
		}
		
		
?>
