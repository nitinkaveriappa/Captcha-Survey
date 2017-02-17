<?php
include('log.php');
//Verifies form, directs to success or survey page
if($_SERVER["REQUEST_METHOD"] == "POST")
{	
	if(isset($_POST['data']))
	{
		$obj = $_POST['data'];
		$values = split(',',$obj,10);
	}
}
?>