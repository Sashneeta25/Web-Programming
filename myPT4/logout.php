<?php
require 'database.php';
if (!isset($_SESSION['loggedin']))
	header("LOCATION: login.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>BYE</title>
	<link rel="shortcut icon" type="image/x-icon" href="logo.png"/>
	<style type="text/css">
	@import url('https://fonts.googleapis.com/css?family=Righteous');
	html{
		overflow: hidden;
		height: 100%;
	}
	body{
		background: linear-gradient(to bottom, #ff0066 0%, #ffff66 100%)fixed;
		font-family: Righteous, Concert One;
		margin: 0;
	}
	canvas{
		position: fixed;
		top: 0;
		z-index: -10;
	}
	#bye{
		text-align: center;
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
	}
	h2{
		display: inline;
	}
</style>
</head>
<body>
	<div id="bye" style="clear: both">
		<h1>See you soon</h1>
		<h2>Redirecting</h2>
		<h2 id="wait">.</h2>
	</div>
	<?php
	    unset($_SESSION);
	    session_destroy();
		header("refresh:5;url=login.php");
	?>
	<script>
		window.dotsGoingUp = true;
		var dots = window.setInterval( function() {
			var wait = document.getElementById("wait");
			if ( window.dotsGoingUp ) 
				wait.innerHTML += ".";
			else {
				wait.innerHTML = wait.innerHTML.substring(1, wait.innerHTML.length);
				if ( wait.innerHTML === "")
					window.dotsGoingUp = true;
			}
			if ( wait.innerHTML.length > 9 )
				window.dotsGoingUp = false;
		}, 100);
	</script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</body>

</html>