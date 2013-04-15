 <?php

require("phpmailer/class.phpmailer.php");
require("phpmailer/class.smtp.php");
function createmail($query,$start)
{	$limit=$start;
	$mail = new PHPMailer(); 
$mail->IsSMTP(); // send via SMTP
//IsSMTP(); // send via SMTP
$mail->SMTPAuth = true; // turn on SMTP authentication
$mail->Username = "daiicthor@gmail.com"; // SMTP username
$mail->Password = "horofdaiict"; // SMTP password
$mail->SMTPKeepAlive = true;                  // SMTP connection will not close after each email sent

			
			$webmaster_email = "da_hostel@daiict.ac.in"; //Reply to this email ID
			$webmaster_name="admin";

			$mail->From = $webmaster_email;

			$mail->FromName = $webmaster_name;

			$mail->AddReplyTo($webmaster_email,$webmaster_name);

														
			$mail->IsHTML(true); // send as HTML
			

			$mail->WordWrap = 50; // set word wrap									//only suportsmax 500 users

																					//$mail->AddAttachment("/var/tmp/file.tar.gz"); // attachment

																					//$mail->AddAttachment("/tmp/image.jpg", "new.jpg"); // attachment

			
			$mail->Subject = $_REQUEST['subject'];
			$mail->Body = $_REQUEST['body']; //HTML Body
			
			


	
		$result = mysql_query($query);
		
				if($result)
				{	
				$count=0;
			echo "<table border='1'>";
			while($post = mysql_fetch_array($result))
			{	if($limit==0)
				{
				 echo "<tr class='row1'>";
				echo "<td class='1'>".$post['id']."</td>";
				echo "<td class='2'>".$post['email']."</td>";
				$mail->AddAddress($post['email'],$post['id']);
				
				echo "</tr>";
				$count=$count+1;
				if($count%500==0)
				{createmail($query,$count);
					break;}
				}
				else
				{
					continue;
					$limit=$limit-1;
					$count=$count+1;
				}
			}
			echo "</table>";
			if($count==0)echo "data not found";
		}
		else
		{
			echo "error";
		}
		
	
	
	if(!$mail->Send())
			{
			echo "Mailer Error: " . $mail->ErrorInfo;
			}
			else
			{
			echo "Message has been sent";
			}
	
}

	 

	 if(isset($_REQUEST['lallan']))
	 {
		}
	 else
	 {
		 die("come through proper channels");
	 }
	
	/////
	
		require_once("config.php");
		
		$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
		
		if(!$link) {
			die('Failed to connect to server: ' . mysql_error());
		}
		
		$db = mysql_select_db(DB_DATABASE);
		if(!$db) {
			die("Unable to select database");
		}
		
	//////
		$query="select * from residents";
		$value=0;
			if(isset($_REQUEST['cbatch']))
					{
					$batch=$_REQUEST['batch'];
					echo $batch;
					if($value==0){$value=$value+1;$query=$query." where ";
					$query=$query." batch ='".$batch."'";}
				}
				if(isset($_REQUEST['cwing']))	
				{
					$wing=$_REQUEST['wing'];
					echo $wing;
				if($value==0){$value=$value+1;$query=$query." where ";}
				else if($value==1){$query=$query." and ";}
				$query=$query." wing ='".$wing."'";
			}
			if(isset($_REQUEST['cfloor']))
			{
			$floor=$_REQUEST['floor'];
			echo $floor;
			if($value==0){$value=$value+1;$query=$query." where ";}
				else if($value==1){$query=$query." and ";}
				$query=$query." floor ='".$floor."'";
			}
			if(isset($_REQUEST['cprog']))
			{
			$prog=$_REQUEST['prog'];
			echo $prog;
			if($value==0){$value=$value+1;$query=$query." where ";}
				else if($value==1){$query=$query." and ";}
				$query=$query." program ='".$prog."'";
			}
			echo $query.";";
			createmail($query,0);
			
//////		
		
			include("mail.php");
		mysql_close();
	 
	?>
			</body>
</html>
