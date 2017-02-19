<?php
class store_incoming
{
	//store incoming_data
	function hardware_data($values,$remoteip,$sessionid)
	{
		include('dbconnect.php');
		//include('log.php');
		//A //check if IP already exists in table
		$verifyQuery = $connection->prepare("SELECT user_id FROM user_data WHERE user_id=:session_id;");
		$verifyQuery->bindParam(':session_id',$sessionid);
		$verifyQuery->execute();

		$verifyCount = $verifyQuery->rowCount();

		//B //check if desktop is being used for Survey
		$desktop=false;
		$sum =0;
		for($i=0;$i<10;$i++)
		{
			$sum += $values[$i];
		}
		if($sum == 0){
			$desktop=true;
		}
		//if A or B
		if($verifyCount < 0 || $desktop==true) {
			//Do nothing
		}
		else {
			//Add the new data into database
			//accelerometer_data
			$addAccelData = $connection->prepare("INSERT INTO accelerometer_data(user_id, ip_address, acc_x, acc_y, acc_z, acc_i, acc_alpha, acc_beta, acc_gamma) VALUES(:sid,:ip,:x,:y,:z,:i,:a,:b,:g);");
			$addAccelData->bindParam(':sid',$sessionid);
			$addAccelData->bindParam(':ip',$remoteip);
			$addAccelData->bindParam(':x',$values[0]);
			$addAccelData->bindParam(':y',$values[1]);
			$addAccelData->bindParam(':z',$values[2]);
			$addAccelData->bindParam(':i',$values[3]);
			$addAccelData->bindParam(':a',$values[4]);
			$addAccelData->bindParam(':b',$values[5]);
			$addAccelData->bindParam(':g',$values[6]);
			$addAccelData->execute();

			$addGyroData = $connection->prepare("INSERT INTO gryoscope_data(user_id, ip_address, gyro_alpha, gyro_beta, gyro_gamma) VALUES(:sid,:ip,:alpha,:beta,:gamma);");
			$addGyroData->bindParam(':sid',$sessionid);
			$addGyroData->bindParam(':ip',$remoteip);
			$addGyroData->bindParam(':alpha',$values[7]);
			$addGyroData->bindParam(':beta',$values[8]);
			$addGyroData->bindParam(':gamma',$values[9]);
			$addGyroData->execute();
		}
		//log_it("$playerEmail registration successful, pending verification");
		//header('Location:index.html');
	}

	function user_data($name,$email,$remoteip,$sessionid)
	{
		include('dbconnect.php');
		//include('log.php');
		//A //check if IP already exists in table
		$verifyQuery = $connection->prepare("SELECT user_id FROM user_data WHERE user_id=:session_id;");
		$verifyQuery->bindParam(':session_id',$sessionid);
		$verifyQuery->execute();

		$verifyCount = $verifyQuery->rowCount();

		//if A
		if($verifyCount > 0)
		{
			//Do nothing
		}
		else
		{
			//Add the new user_data into database
			$addUserData = $connection->prepare("INSERT INTO user_data(user_id, ip_address, name, email) VALUES(:sid,:ip,:name,:email);");
			$addUserData->bindParam(':sid',$sessionid);
			$addUserData->bindParam(':ip',$remoteip);
			$addUserData->bindParam(':name',$name);
			$addUserData->bindParam(':email',$email);
			$addUserData->execute();
		//Sends the thankYou email to member
		//$this->thankYou($email);
		}
	}
	//send email
	function thankYou($email)
	{
		//send thankYou
		$config = parse_ini_file('config.php');
		$link = $config['link'];
		$headers='From: nitinkaveriappa@yahoo.in'. "\r\n" .'MIME-Version: 1.0' . "\r\n" .'Content-type: text/html; charset=utf-8' ."\r\n" .'X-Mailer: PHP/' . phpversion();
		$subject = 'Thank You';
		$content = "Please share the link with your friends: $link";
		mail($email,$subject,$content,$headers );
	}
}
?>
