<?php
//Verifies data, directs to store data page
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	if(isset($_POST['data']))
	{
		$obj = $_POST['data'];
		$values = split(',',$obj,10);
		$remoteip= $_SERVER['REMOTE_ADDR'];

		include('data_store.php');
		$survey_data = new store_incoming();
    $survey_data->hardware_data($values,$remoteip);
	}
	else
	{
		header("Location:index.html?type=err");
	}
}
?>
