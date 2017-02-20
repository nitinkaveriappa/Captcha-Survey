<!DOCTYPE html>
<html lang="en">

<?php
session_start();
if (!isset($_SESSION['created']))
{
  $_SESSION['created'] = time();
}
$idle = time() - $_SESSION['created'];
if ($idle > 180)
{
  // Unset all of the session variables
  $_SESSION = array();
  // Delete the session cookie
	if (ini_get("session.use_cookies"))
	{
    	$params = session_get_cookie_params();
    	setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
	}
	//Destroy session
   	if(session_destroy()) {
      header("Location:index.php");
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

  <script src='https://www.google.com/recaptcha/api.js'></script>
	<script src="js/error.js"></script>
	<script src="js/script.js"></script>
	<script src='js/jquery-3.1.1.min.js'></script>
	<style>
	#no {
		display: none;
	}
	</style>

  <script>
    window.onload = function() {
      errCheck()	};
  </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

  </head>

  <body>
	<!--/*Are You a Human Tag*/-->
	<script type="text/javascript" src="https://n-cdn.areyouahuman.com/play/sMG6XzdgJi4MRYTEZqM2csEEHob48TFcHBQnhLsC"></script>
	<noscript><img src="https://n-cdn.areyouahuman.com/noscript/sMG6XzdgJi4MRYTEZqM2csEEHob48TFcHBQnhLsC"></noscript>
	<!--/*End Human Tag*/-->

    <div class="container">

      <form class="form-signin" action="submit_data.php" method="POST">
        <span id="errmsg" style="color:#F03"> </span><br/>
        <h2 class="form-signin-heading">Captcha-Survey</h2><br/>
		    <label for="inputName" class="sr-only">Name</label>
		    <input type="text" name="Name" id="inputName" class="form-control" placeholder="John Doe" autofocus><br/>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="Email" id="inputEmail" class="form-control" placeholder="johndoe@gmail.com">
        <br/>
          <p>Please solve this captcha below!</p>
        <!-- sweetcaptcha -->
        <?php
        require_once('sweetcaptcha.php');
        echo $sweetcaptcha->get_html()
        ?>
        <br/>
        <p>How user friendly did you find the above captcha to fill?</p>
        <div class="radio">
          <label><input type="radio" name="sweetradio" value="1">1 (Least User Friendly)</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="sweetradio" value="2">2</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="sweetradio" value="2">3</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="sweetradio" value="4">4</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="sweetradio" value="5">5</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="sweetradio" value="6">6</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="sweetradio" value="7">7</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="sweetradio" value="8">8</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="sweetradio" value="9">9</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="sweetradio" value="10">10 (Most User Friendly)</label>
        </div>
        <br/>
        
        <p>Please solve this captcha below!</p>
        <div class="g-recaptcha" data-theme="dark" data-sitekey="6LdahgcUAAAAAAm5QqZCBVaaIvZIhL5ehTSPXsd2"></div>
        <br/>
        <p>How user friendly did you find the above captcha to fill?</p>
        <div class="radio">
          <label><input type="radio" name="googleradio" value="1">1 (Least User Friendly)</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="googleradio" value="2">2</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="googleradio" value="3">3</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="googleradio" value="4">4</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="googleradio" value="5">5</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="googleradio" value="6">6</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="googleradio" value="7">7</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="googleradio" value="8">8</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="googleradio" value="9">9</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="googleradio" value="10">10 (Most User Friendly)</label>
        </div>
        <br/>
      
        <p>Which would you prefer?</p>
        <div class="radio">
          <label><input type="radio" name="judgementradio" value="1">Captcha 1</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="judgementradio" value="2">Captcha 2</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="judgementradio" value="3">Prefer No Captcha at all!!!</label>
        </div>
        <br/>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
      </form>

	<center>
		Hardware Values<br>
		<div id="yes">
				<span class="head">Accelerometer</span>
				<span id="xlabel"></span>
				<span id="ylabel"></span>
				<span id="zlabel"></span>
				<span id="ilabel"></span>
				<span id="arAlphalabel"></span>
				<span id="arBetalabel"></span>
				<span id="arGammalabel"></span><br/>
				<span class="head">Gyroscope</span>
				<span id="alphalabel"></span>
				<span id="betalabel"></span>
				<span id="gammalabel"></span>
		</div>
		<div id="no">
			Your browser does not support Device Orientation and Motion API. Try this sample with iPhone, iPod or iPad with iOS 4.2+.
		</div>
	</center>
    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="bootstrap/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
