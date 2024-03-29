<?php
session_start();
$current_id = session_id();
if (!isset($_SESSION['created']))
{
  $_SESSION['created'] = time();
}
$idle = time() - $_SESSION['created'];

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
		header("Location:index.php?type=err");
	}
	//Verifies Email is in valid format
	if(isset($_POST['Email']) && preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{1,4}$/',$_POST['Email'])  && strlen($_POST['Email']) < 50)
	{
		$email = $_POST['Email'];
	}
	else
	{
		header("Location:index.php?type=err");
	}
	//googleradio
	if(isset($_POST['googleradio']))
	{
		$googleradio = $_POST['googleradio'];
	}
	else
	{
		header("Location:index.php?type=err");
	}
	//sweetradio
	if(isset($_POST['sweetradio']))
	{
		$sweetradio = $_POST['sweetradio'];
	}
	else
	{
		header("Location:index.php?type=err");
	}
	//judgementradio
	if(isset($_POST['judgementradio']))
	{
		$judgementradio = $_POST['judgementradio'];
	}
	else
	{
		header("Location:index.php?type=err");
	}

	//Verifies the Sweet captcha is set
	$sweet=false;
	require_once("sweetcaptcha.php");
	if (isset($_POST['sckey']) && isset($_POST['scvalue']) && $sweetcaptcha->check(array('sckey' => $_POST['sckey'], 'scvalue' => $_POST['scvalue'])) == "true") {
		// success! your form was validated
		$sweet = true;
	}
	else {
			// alas! the validation has failed, the user might be a spam bot or just got the result wrong
		$sweet = false;
	}

	//Verifies the Google captcha is set
	if(isset($_POST['g-recaptcha-response']))
	{
		$captcha=$_POST['g-recaptcha-response'];
	}
	else
	{
		header("Location:index.php?type=err");
	}

	//get captcha secret
	$config = parse_ini_file('config.php');
	$secret = $config['secret'];
	//Validates the captcha value from google server
	$response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
	$data = json_decode($response);

	//If its a bot it redirects to index
	if($data->success==false || $sweet==false)
     {
       header("Location:index.php?type=bot");
     }
	//If not a bot 	then tries to login in player
	else {
		$remoteip= $_SERVER['REMOTE_ADDR'];

		include('data_store.php');
		$submit_data = new store_incoming();
	  $submit_data->user_data($name,$email,$remoteip,$current_id,$googleradio,$sweetradio,$judgementradio);
	}
}
if ($idle > 180)
{
	session_regenerate_id();
  // Unset all of the session variables
  $_SESSION = array();
  // Delete the session cookie
	if (ini_get("session.use_cookies"))
	{
    	$params = session_get_cookie_params();
    	setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
	}
}

?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags must come first in the head; any other head content must come after these tags -->
    <meta name="description" content="Captcha Survey Page">
	  <meta name="author" content="Nitin Kaveriappa">
    <link rel="icon" href="favicon.ico">

    <title>Survey</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="bootstrap/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="bootstrap/css/signin.css" rel="stylesheet">

    <script src="bootstrap/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

	<style>
	#no {
		display: none;
	}
	</style>
  </head>

  <body>

    <div class="container">
    <center><h2> Thank You! </h2></center>
	</div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="bootstrap/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
