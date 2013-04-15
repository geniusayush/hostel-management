
<html>
	<head>
		<title>Forum </title>
		
	</head>
	
	<body>
	<h3>forum</h3>
	
	 <?php
	 $admin=0; 
	 session_start();
	 //echo "hello";
	 //echo $_SESSION['access'];
	 if(isset($_SESSION['access'])&& $_SESSION['access']==4)
	 {
			$admin=1;
	 }
	
	 ?>
	 <?php
		require_once("config.php");
		$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
		
		if(!$link)
		 {
			die('Failed to connect to server: ' . mysql_error());
		}
		
		$db = mysql_select_db(DB_DATABASE);
		if(!$db) {
			die("Unable to select database");
		}
		
		$qry = "SELECT * FROM forum ";
		$result = mysql_query($qry);
		 ?>
		 <?php
		 
		if($result)
		{	if($admin==1)
				{
					echo "<form action='deleteprocess2.php' method='post'>";
					echo "<input type='hidden' name='lallan' value='top'>";
				}
			echo "<table border='1'>";
			while($post = mysql_fetch_array($result))
			{
				 echo "<tr class='row1'>";
				echo "<td class='1'>".$post['forum_id']."</td>";
				echo "<td class='2'>".$post['subject']."</td>";
				echo "<td class='3'>".$post['date']."</td>";
				echo "<td class='4'>".$post['time']."</td>";
				echo "<td class='6'>".$post['name']."</td>";
				if($admin==1)
				{
					echo "<td><input type='checkbox' name='formDoor[]' value='$post[forum_id]'/></td>";}
				echo "</tr>";
				echo "<tr class='row2'>";
				echo "<td class='5'>".$post['post']."</td>";
				echo "</tr>";
				
			}
			echo "</table>";
		}
		else
		{
			echo "error";
		}

	 ?>
	 <?php
	if($admin==1)
				{ echo "<input type='submit' value='delete'></form>";}
	 ?>
	 //saare label laga lena
<form action=postprocess2.php method="post">
			Subject :<input type="text" name="subject">
			name<input type="text" name="name" >
			
			post:<input type="textarea"  name="post">
			<input type="hidden" name="lallan" value="top">
			<input type="submit" value='post'>
			
			</form>
	</body>
</html>
