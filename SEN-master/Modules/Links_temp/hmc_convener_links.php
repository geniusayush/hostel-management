<html>
<head>
<title>Menu Bar Include</title>
<?PHP 	
		session_start();
		if(isset($_SESSION['access'])&&($_SESSION['access']=='3'))
		{
				if(isset($_POST['SUBMIT1']))
				{
						header('location:/sen/Modules/hmc_convener/add_artifact.php');
			
				}
				if(isset($_POST['SUBMIT2']))
				{
						header('location:/sen/Modules/hmc_convener/change_artifact.php');
			
				}
				if(isset($_POST['SUBMIT3']))
				{
						header('location:/sen/Modules/hmc_convener/view_etic.php');
			
				}
				if(isset($_POST['SUBMIT4']))
				{
						header('location:/sen/Modules/hmc_convener/remove_all_etic.php');
			
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
				<FORM NAME="form2" METHOD="POST" ACTION="hmc_convener_links.php" >
			
				<INPUT TYPE="SUBMIT" NAME="SUBMIT1" VALUE="Add Artifact">
				<br>
				<INPUT TYPE="SUBMIT" NAME="SUBMIT2" VALUE="Change Artifact">
				<br>
				<INPUT TYPE="SUBMIT" NAME="SUBMIT3" VALUE="View ETIC">
				<br>
				<INPUT TYPE="SUBMIT" NAME="SUBMIT4" VALUE="Delete All ETIC">
				<br>
				<INPUT TYPE="SUBMIT" NAME="SUBMIT9" VALUE="Sign out">
				<br>
			</FORM>
</body>
</html>
