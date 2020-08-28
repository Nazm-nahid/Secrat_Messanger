<?php
	//CHECK LOGIN VALIDATION
	include ('login_validation.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>e-Stash</title>
	<link rel="shortcut icon" href="favicon.png" type="image/png" media="all">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="style.css" type="text/css" media="all">
</head>
<body>

	<div class="login-wrap">
	<div class="login-html">
	    	<h1> <b><i> e-Stash</b></i> </h1>
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Send Message</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up" ><label for="tab-2" class="tab"></label>
		<div class="login-form">
			<div class="sign-in-htm">
			    	<form action="indivisuals.php" method ="post">
				<div class="group">
					<label for="pass" class="label">User Key</label>
					<input id="pass" type="text" class="input" name="key">
				</div>
				<div class="group">
					<label for="pass" class="label">Message</label>
					<textarea name="message" rows="6" cols="17"class="input"></textarea>
					
				</div>
				
				<div class="group">
					<input type="submit" class="button" value="Send" name="post">
				</div>
			</form>
				<div class="hr"></div>
				<div class="foot-lnk">
					<a href="https://facebook.com/nahidnazm"><p style="font-size:11px"> © Nazmul Hossain Nahid  <p style="font-size:7px">(RUET CSE'18)</p></p></a> 
				</div>
				
				
				
				
			</div>
			<div class="sign-up-htm">
			
			</div>
		</div>
	</div>
</div>
</body>
</html>




