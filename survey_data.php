<?php
//Verifies data, directs to store data page
include('data_store.php');

session_start();
$current_id = session_id();

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	if(isset($_POST['data']))
	{
		$obj = $_POST['data'];
		$values = split(',',$obj,11);
		$remoteip= $_SERVER['REMOTE_ADDR'];

		$survey_data = new store_incoming();
    	$survey_data->hardware_data($values,$remoteip,$current_id);
	}
	else
	{
		header("Location:index.php?type=err");
	}
}
?>
