<?php
	session_start();
	$cc = false;
	$bb = false;
	//CHECK LOGIN VALIDATION
	$bt = $_SESSION['hex']??'-100';
	
	if( $bt == -100 || $bt == 0) {
	    header("Location: signup.php");  
	    return ;
	}
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
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Join</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up" ><label for="tab-2" class="tab">Create</label>
		<div class="login-form">
			<div class="sign-in-htm">
			    	<form action="joingroup.php" method ="post">
				<div class="group">
					<label for="pass" class="label">Group Key</label>
					<input id="pass" type="text" class="input" name="key">
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="pass" type="password" class="input" data-type="password" name="pass">
				</div>
				
				<div class="group">
					<input type="submit" class="button" value="Join" name="post">
				</div>
			</form>
				<div class="hr"></div>
				<div class="foot-lnk">
					<a href="https://facebook.com/nahidnazm"><p style="font-size:11px"> © Nazmul Hossain Nahid  <p style="font-size:7px">(RUET CSE'18)</p></p></a> 
				</div>
				
				
				
				
			</div>
			<div class="sign-up-htm">
			
			<form action="creategroup.php" method ="post">
				<div class="group">
					<label for="pass" class="label">Group Key</label>
					<input id="pass" type="text" class="input" name="key">
				</div>
				<div class="group">
					<label for="pass" class="label">Group Name</label>
					<input id="pass" type="text" class="input" name="name">
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="pass" type="password" class="input" data-type="password" name="pass">
				</div>
				
				<div class="group">
					<label for="pass" class="label">Repeat Password</label>
					<input id="pass" type="password" class="input" data-type="password" name="pass2">
				</div>
		 		
				<div class="group">
					<input type="submit" class="button" value="Create" name="post">
				</div>
			</form>
				<div class="hr"></div>
				<div class="foot-lnk">
						<a href="https://facebook.com/nahidnazm"><p style="font-size:11px"> © Nazmul Hossain Nahid  <p style="font-size:7px">(RUET CSE'18)</p></p></a> 
				</div>
			
			</div>
		</div>
	</div>
</div>
</body>
</html>




