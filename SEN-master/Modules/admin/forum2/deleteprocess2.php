<html>
	<head>
		<title>Forum </title>
	</head>
	
	<body>
	<h3>forum</h3>
	
	 <?php
	 
	 if(isset($_REQUEST['lallan']))
	 {
		 }
	 else
	 {
		 die("come through proper channels");
	 }
		require_once("config.php");
		
		$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
		
		if(!$link) {
			die('Failed to connect to server: ' . mysql_error());
		}
		
		$db = mysql_select_db(DB_DATABASE);
		if(!$db) {
			die("Unable to select database");
		}
		
			$aDoor = $_POST['formDoor'];
		if(empty($aDoor)) 
			{
			echo("You didn't select any buildings.");
			} 
		else
		{
			$N = count($aDoor);
 		
			for($i=0; $i < $N; $i++)
			{	
			mysql_query("delete from forum where forum_id='$aDoor[$i]'");
			}
		}

	
		 		$qry2 = "SELECT * FROM forum ";
		$result3 = mysql_query($qry2);
		 
		if($result3)
		{	$count=0;
			while($post = mysql_fetch_array($result3))
			{	$count=$count+1;
				$result2 = mysql_query("UPDATE forum SET forum_id='$count' WHERE forum_id='$post[forum_id]'");
			}
			
		}///this function needs to be worked out
		mysql_close();
		header("Location:forum2.php");
	 ?>
	
			</body>
</html>
