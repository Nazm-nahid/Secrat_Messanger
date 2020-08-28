<?php
	session_start();
	$cc = false;
	$bb = false;
	$passa=false;
	$bondhu='';
	if( isset($_GET['id']))
	{
		$bondhu = $_GET['id'];
	}
	if( isset($_POST['post']) )
	{
		include 'dbsql.php';
		$userr	  	= $_POST['user'];
		$passs 		= $_POST['pass'];
		$passs2		= $_POST['pass2'];
		$fullname	= $_POST['fname'];
		$userr 		= mysqli_real_escape_string($db,$userr);
		$passs 		= mysqli_real_escape_string($db,$passs);
		$passs2		= mysqli_real_escape_string($db,$passs2);
		$fullname 	= mysqli_real_escape_string($db,$fullname);
		$iid		= 0;
		$namee		='';
		
	//CHECKING USERNAME VALIDATION
		$sqll 		= "SELECT * FROM user123";
		$ress 		= mysqli_query ($db ,$sqll) or die (mysqli_error);
		if( mysqli_num_rows($ress) > 0 )
		{
	 		while( $row = mysqli_fetch_assoc($ress) )
	 		{

	 			$idd = $row['user_name'];
		 			if( $idd == $userr )
		 			{
		 					$cc = true;
		 			}
	 		}
	 	}

	 //CHECKING SUBMISSION VALIDATION
	 	if( $userr == "" || $passs == "" || $passs2 == "" || $fullname == "" )
					{
						$bb=true;
					}
				
		else if( $passs2 != $passs )
					{
						$passa=true;
					}

	//CREATING ACCOUNT
 		if( $cc == false && $passa == false && $bb == false )
 		{
 	//INSERT USER
			 $sql = "INSERT INTO user123 (user_name,flname,passw) VALUES ('$userr','$fullname','$passs')";
			mysqli_query($db,$sql);
	//CREATING USER TABLE
			$sql_table = "CREATE TABLE $userr (
										id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
										groupname VARCHAR(30) NOT NULL,
										reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
						 )";
			$res_table = mysqli_query($db, $sql_table)or die (mysqli_error);
                               
	//FINDING ID
			$sqlll = "SELECT * FROM user123";
			$resss = mysqli_query ($db ,$sqlll) or die (mysqli_error);

			if( mysqli_num_rows($resss) > 0)
					{
						while( $roww = mysqli_fetch_assoc($resss) )
								{
									$iddd =$roww['user_name'];
									if( $iddd == $userr )
										{
											$iid	= $roww['id'];
											$namee	= $roww['flname'];
											$iid	= mysqli_real_escape_string($db,$iid);
											$namee	= mysqli_real_escape_string($db,$namee);
										}
								}
					}
											 	
	//CREATING SESSION										
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

	<div class="login-wrap">
	<div class="login-html">
	    	<h1> <b><i> e-Stash</b></i> </h1>
		<input id="tab-1" type="radio" name="tab" class="sign-in" ><label for="tab-1" class="tab">Sign In</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up" checked><label for="tab-2" class="tab">Sign Up</label>
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
					<input id="user" type="text"  class="input" name="user">
				</div>
				<?php if($cc==true) { 
		 		echo ('<h5><font color="red"> <b><i>*User name has already been taken</i></b></font></h5>');
		 		} ?>
		 		

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
		 		<?php if($passa==true) { 
		 		echo ('<h5><font color="red"> <b><i>*Password and Reapet Password must be same</i></b></font></h5>');
		 		} ?>
				<?php if($bb=='true') { 
		 		echo ('<h5><font color="red"> <b><i>*You have to fill all field</i></b></font></h5>');
		 		} ?>
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


