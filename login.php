<?php

	$cc = true;
	$bondhu='';
	if( isset($_GET['id']))
	{
		$bondhu = $_GET['id'];
	}

	if( isset($_POST['post']) )
	{
		include 'dbsql.php';
		$userr	= $_POST['user'];
		$passs	= $_POST['pass'];
		$userr 	= mysqli_real_escape_string($db,$userr);
		$passs 	= mysqli_real_escape_string($db,$passs);
		$iid	= 0;
		$namee	= '';
		$cc 	= false;
	//CHECKING PASSWORD
		$sqll = "SELECT * FROM user123";
		$ress = mysqli_query ($db ,$sqll) ;

		if( mysqli_num_rows($ress) > 0 )
		{
	 		while( $row = mysqli_fetch_assoc($ress) )
	 		{

	 			$idd 	= $row['user_name'];
	 			$pussy	= $row['passw'];
		 		if( $idd == $userr && $pussy == $passs )
		 			{
		 				$cc 	= true;
		 				$iid	= $row['id'];
		 				$namee	= $row['flname'];
		 				$iid	= mysqli_real_escape_string($db,$iid);
		 				$namee	= mysqli_real_escape_string($db,$namee);
		 			}
	 		}
	 	}
	//CREATING SESSION	
 		if( $cc )
 		{
			 		session_start();
					$_SESSION['hex']	  = $iid;
					$_SESSION['hexi']	  = $namee;
					$_SESSION['hex_user'] = $userr;			 		
					if( isset($_GET['id']))
									{
										$bondhu = $_GET['id'];
										$kala="msg.php?id=".$bondhu;
										$host  = $_SERVER['HTTP_HOST'];
										$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
										$extra = 'mypage.php';
										header("Location: http://$host$uri/$kala");
										exit;
									}
								else
									{
										header("Location: index.php");
										exit;
									}
 		}
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
	<div class="babaji"></div>
		<div class="login-wrap">
			<div class="login-html">
	    	<h1> <b><i> e-Stash</b></i> </h1>
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
		<div class="login-form">
			<div class="sign-in-htm">
				<form action="login.php<?php if($bondhu !='')
			    	{echo "?id=";echo htmlspecialchars($bondhu); }?>" method ="post">
				<div class="group">
					<label for="user" class="label">Username</label>
					<input id="user" type="text" class="input" name="user">
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="pass" type="password" class="input" data-type="password" name="pass">
				</div>
				<?php if($cc==false) { 
		 		echo ('<h5><font color="red"> <b><i>*User name or Password is incorrect</i></b></font></h5>');
		 		} ?>
				
				<div class="group">
					<input type="submit" class="button" value="Sign In" name="post">
				</div>
				</form>
				<div class="hr"></div>
				<div class="foot-lnk">
					<a href="https://facebook.com/nahidnazm"><p style="font-size:11px"> © Nazmul Hossain Nahid  <p style="font-size:7px">(RUET CSE'18)</p></p></a> 
				</div>
			</div>
			<div class="sign-up-htm">
				<form action="signup.php<?php if($bondhu !='')
			    	{echo "?id=";echo htmlspecialchars($bondhu); }?>" method ="post">
				<div class="group">
					<label for="user" class="label">Username</label>
					<input id="user" type="text" class="input" name="user">
				</div>
				<div class="group">
					<label for="pass" class="label">Nick Name</label>
					<input id="pass" type="text" class="input" name="fname">
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
					<input type="submit" class="button" value="Sign Up" name="post">
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


