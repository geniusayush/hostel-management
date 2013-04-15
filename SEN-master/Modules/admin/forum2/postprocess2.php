
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
		
		$qid=mysql_query("select * from forum order by forum_id  desc limit 1");
		$q2id=mysql_fetch_array($qid);
		$id=$q2id['forum_id']+1;
		
		
		
		$daten=date("Y/m/d");
		$time=date("H:i", time());
$qry = "INSERT INTO forum(forum_id, subject, date,time, name, post) VALUES ('$id','$_REQUEST[subject]','$daten','$time','$_REQUEST[name]','$_REQUEST[post]')";
		$result = mysql_query($qry);
		if(!$result)
		{die("error");}
		mysql_close();
	header("Location:forum2.php");
	 ?>
	 
	 
	 	</body>
</html>
