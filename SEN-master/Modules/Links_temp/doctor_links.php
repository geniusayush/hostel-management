<html>
<head>
<title>Doctor- Home Page</title>
<?PHP 	
		session_start();
		if(isset($_SESSION['access'])&&($_SESSION['access']=='6'))
		{
				if(isset($_POST['SUBMIT1']))
				{
						header('location:/sen/Modules/doctor/change_password.php');
			
				}
				if(isset($_POST['SUBMIT2']))
				{
						
						header('location:/sen/Modules/doctor/student_entries.php');
			
				}
				if(isset($_POST['SUBMIT3']))
				{
						
						header('location:/sen/Modules/doctor/add_suggestion.php');
			
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
			header('location:/sen/Modules/login.php');
			echo "Please login properly";
			
		}
		
		
 ?>


</head>

<body bgcolor="#FFFFFF" text="#000000">
			<FORM NAME="form1" METHOD="POST" ACTION="doctor_links.php" >
			
				<INPUT TYPE="SUBMIT" NAME="SUBMIT1" VALUE="Change Password">
				<br>
				<INPUT TYPE="SUBMIT" NAME="SUBMIT2" VALUE="Student Entries">
				<br>
				<INPUT TYPE="SUBMIT" NAME="SUBMIT3" VALUE="Add Suggestion">
				<br>
				<INPUT TYPE="SUBMIT" NAME="SUBMIT9" VALUE="Sign out">
				<br>
			</FORM>
</body>
</html>
