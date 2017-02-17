<?php
//Verifies form, directs to success or survey page
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	//Verifies Name is in valid format
	if(isset($_POST['Name']) && preg_match("/^[a-zA-Z0-9.' ]+$/",$_POST['Name'])  && strlen($_POST['Name']) < 35)
	{
		$name = $_POST['Name'];
	}
	else
	{
		header("Location:index.html?type=err");
	}
	//Verifies Email is in valid format
	if(isset($_POST['Email']) && preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{1,4}$/',$_POST['Email'])  && strlen($_POST['Email']) < 50)
	{
		$email = $_POST['Email'];
	}
	else
	{
		header("Location:index.html?type=err");
	}

	$remoteip= $_SERVER['REMOTE_ADDR'];

	include('data_store.php');
	$submit_data = new store_incoming();
  $submit_data->user_data($name,$email,$remoteip);
}
?>
