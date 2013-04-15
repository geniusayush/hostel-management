<html>
<head>
<title>HMC Links</title>
<?PHP 	
		session_start();
		if(isset($_SESSION['access'])&&($_SESSION['access']=='2'))
		{
				if(isset($_POST['SUBMIT1']))
				{
						header('location:/sen/Modules/hmc/change_password.php');
			
				}
				if(isset($_POST['SUBMIT2']))
				{
						header('location:/sen/Modules/hmc/ETIC_paid.php');
			
				}
				if(isset($_POST['SUBMIT3']))
				{
						
						$_SESSION['access']=0;
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
				<FORM NAME="form2" METHOD="POST" ACTION="hmc_links.php" >
			
				<INPUT TYPE="SUBMIT" NAME="SUBMIT1" VALUE="Change Password">
				<br>
				<INPUT TYPE="SUBMIT" NAME="SUBMIT2" VALUE="ETIC Paid Set">
				<br>
				<INPUT TYPE="SUBMIT" NAME="SUBMIT3" VALUE="Sign out">
				<br>
			</FORM>
</body>
</html>