<!DOCTYPE html>
<html lang="en">

<?php
session_start();
if (!isset($_SESSION['created']))
{
  $_SESSION['created'] = time();
}
$idle = time() - $_SESSION['created'];

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
        	<p>The objective of this survey is to determine if users prefer to fill captchas for verification or not. With this information, we plan to develop a human verification system that requires no tedious actions to be performed by the users.</p>
            <p>Please fill the following details using your mobile device. These details are gathered only to verify your uniqueness and will not be used beyond this purpose.</p>
		    <label for="inputName" class="sr-only">Name</label>
		    <input type="text" name="Name" id="inputName" class="form-control" placeholder="Name" required autofocus><br/>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="Email" id="inputEmail" class="form-control" placeholder="Email Id" required>
        <br/>
          <p>Please solve the captcha below!</p>
        <!-- sweetcaptcha -->
        <?php
        require_once('sweetfilter.php');
        echo $sweethtml;
        ?>
        <br/>
        <p>How user friendly did you find the above captcha?</p>
        <div class="radio">
          <label><input type="radio" name="sweetradio" value="1" required>1 (Least User Friendly)</label>
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

        <p>Please solve the captcha below!</p>
        <div class="g-recaptcha" data-theme="dark" data-sitekey="6LdahgcUAAAAAAm5QqZCBVaaIvZIhL5ehTSPXsd2"></div>
        <br/>
        <p>How user friendly did you find the above captcha?</p>
        <div class="radio">
          <label><input type="radio" name="googleradio" value="1" required>1 (Least User Friendly)</label>
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
          <label><input type="radio" name="judgementradio" value="1" required>Captcha</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="judgementradio" value="2">No Captcha at all!!!</label>
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
    <p>&copy; Nitin Kaveriappa &amp; Paurav Surendra</p>    
	</center>
    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="bootstrap/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
