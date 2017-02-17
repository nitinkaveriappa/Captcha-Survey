<?php
include('log.php');
//Verifies form, directs to success or survey page
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	if(isset($_POST['data']))
	{
		$obj = $_POST['data'];
		$values = split(',',$obj,10);
		$remoteip= $_SERVER['REMOTE_ADDR'];

		include('data_store.php');
		$survey_data = new store_incoming();
    $survey_data->incoming_data($values,$remoteip);
	}
}
?>
