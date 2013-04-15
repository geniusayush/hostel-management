<html>
<head>
<title>Menu Bar Include</title>
<?PHP 	
		session_start();
		if(isset($_SESSION['access'])&&($_SESSION['access']=='4'))
		{
				if(isset($_POST['SUBMIT1']))
				{
						header('location:/sen/Modules/admin/register_resident.php');
			
				}
				if(isset($_POST['SUBMIT2']))
				{
						
						header('location:/sen/Modules/admin/register_admin.php');
			
				}
				if(isset($_POST['SUBMIT3']))
				{
						header('location:/sen/Modules/admin/change_password.php');
			
				}
				if(isset($_POST['SUBMIT4']))
				{
						header('location:/sen/Modules/admin/register_hmc.php');
			
				}
				if(isset($_POST['SUBMIT5']))
				{
						header('location:/sen/Modules/admin/change_hmc.php');
			
				}
				if(isset($_POST['SUBMIT6']))
				{
						header('location:/sen/Modules/admin/register_doctor.php');
			
				}
				if(isset($_POST['SUBMIT7']))
				{
						header('location:/sen/Modules/admin/register_laptop.php');
			
				}
				if(isset($_POST['SUBMIT8']))
				{
						header('location:/sen/Modules/admin/Change_resident.php');
			
				}
				if(isset($_POST['SUBMIT10']))
				{
						header('location:/sen/Modules/admin/view_doctor_suggestions.php');
			
				}
				if(isset($_POST['SUBMIT11']))
				{
						header('location:/sen/Modules/admin/reset_password.php');
			
				}
				
				if(isset($_POST['SUBMIT12']))
				{
						header('location:/sen/Modules/admin/view_student_details.php');
			
				}
				if(isset($_POST['SUBMIT13']))
				{
						header('location:/sen/Modules/admin/view_laptop_registrations.php');
			
				}
				if(isset($_POST['SUBMIT14']))
				{
						header('location:/sen/Modules/admin/register_dhobi.php');
			
				}
				if(isset($_POST['SUBMIT15']))
				{
						header('location:/sen/Modules/admin/forum2/forum2.php');
			
				}
				if(isset($_POST['SUBMIT16']))
				{
						header('location:/sen/Modules/admin/view_laptop_gate_entry.php');
			
				}
				if(isset($_POST['SUBMIT17']))
				{
						header('location:/sen/Modules/admin/view_gate_leave.php');
			
				}
				if(isset($_POST['SUBMIT18']))
				{
						header('location:/sen/Modules/admin/view_gate_evening.php');
			
				}
				if(isset($_POST['SUBMIT19']))
				{
						header('location:/sen/Modules/admin/chage_laptop.php');
			
				}
				if(isset($_POST['SUBMIT21']))
				{
						header('location:/sen/Modules/admin/delete_batch.php');
			
				}
				if(isset($_POST['SUBMIT23']))
				{
						header('location:/sen/Modules/admin/view_doctor_entries.php');
			
				}
				if(isset($_POST['SUBMIT9']))
				{
						
						$_SESSION['access']=0;
						$_SESSION['login_id']=0;
						session_destroy();
						header('location:/sen/Modules/login/login.php');
			
				}
		}
		else
		{
			header('location:/sen/Modules/login/login.php');
			echo "Please login properly";
			
		}
		
		
 ?>


</head>

<body bgcolor="#FFFFFF" text="#000000">
				<FORM NAME="form2" METHOD="POST" ACTION="admin_links.php" >
			
				<INPUT TYPE="SUBMIT" NAME="SUBMIT1" VALUE="Register New Residents">
				<br>
				<INPUT TYPE="SUBMIT" NAME="SUBMIT2" VALUE="Register New Admin">
				<br>
				<INPUT TYPE="SUBMIT" NAME="SUBMIT3" VALUE="Change Password">
				<br>
				<INPUT TYPE="SUBMIT" NAME="SUBMIT4" VALUE="Register HMC">
				<br>
				<INPUT TYPE="SUBMIT" NAME="SUBMIT5" VALUE="Change HMC">
				<br>
				<INPUT TYPE="SUBMIT" NAME="SUBMIT6" VALUE="Register New Doctor">
				<br>
				<INPUT TYPE="SUBMIT" NAME="SUBMIT7" VALUE="Register New Laptop">
				<br>
				<INPUT TYPE="SUBMIT" NAME="SUBMIT8" VALUE="Change Resident Details">
				<br>
				<INPUT TYPE="SUBMIT" NAME="SUBMIT10" VALUE="View Doctor Suggestions">
				<br>
				<INPUT TYPE="SUBMIT" NAME="SUBMIT11" VALUE="Reset Password Of Other Accounts">
				<br>
				<INPUT TYPE="SUBMIT" NAME="SUBMIT12" VALUE="View Student Details">
				<br>
				<INPUT TYPE="SUBMIT" NAME="SUBMIT13" VALUE="View Laptop Registrations">
				<br>
				<INPUT TYPE="SUBMIT" NAME="SUBMIT14" VALUE="Registrations Dhobi">
				<br>
				<INPUT TYPE="SUBMIT" NAME="SUBMIT15" VALUE="Manage forum">
				<br>
				<INPUT TYPE="SUBMIT" NAME="SUBMIT16" VALUE="View Laptop Entries">
				<br>
				<INPUT TYPE="SUBMIT" NAME="SUBMIT17" VALUE="View Gate Entries">
				<br>
				<INPUT TYPE="SUBMIT" NAME="SUBMIT18" VALUE="View Gate Entries after 7">
				<br>
				<INPUT TYPE="SUBMIT" NAME="SUBMIT19" VALUE="Change Laptop">
				<br>
				<INPUT TYPE="SUBMIT" NAME="SUBMIT21" VALUE="Delete batch">
				<br>
				<INPUT TYPE="SUBMIT" NAME="SUBMIT23" VALUE="View Doctor Entries">
				<br>
				<INPUT TYPE="SUBMIT" NAME="SUBMIT9" VALUE="Sign out">
				<br>
			</FORM>
</body>
</html>
