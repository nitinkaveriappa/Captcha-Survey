<?php
//Verifies data, directs to store data page
include('data_store.php');
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	if(isset($_POST['data']))
	{
		$obj = $_POST['data'];
		$values = split(',',$obj,10);
		$remoteip= $_SERVER['REMOTE_ADDR'];
	
		$survey_data = new store_incoming();
    	$survey_data->hardware_data($values,$remoteip);
echo "php";		
	}
	else
	{
		header("Location:index.html?type=err");
	}
}
?>
