<?php
	session_start();
	$cc = false;
	$bb = false;
	//CHECK LOGIN VALIDATION
	include ('login_validation.php');
	
	if( isset($_POST['post']) )
	{
			$namee 	= $_POST['key'];
			$name_  = $user.'10'.$namee;
			$passi 	= $_POST['message'];
			$namee 	= mysqli_real_escape_string($db,$namee);
			$name_ 	= mysqli_real_escape_string($db,$name_);
			$passi 	= mysqli_real_escape_string($db,$passi);
			
	//CHECK SUBMISSION VALIDATION
			if( $namee == '') $bb = true;

	
	if( $cc == false && $bb == false )
		{
	//GET NAME
			$sqllt = "SELECT * FROM user123";
			$resst = mysqli_query ($db ,$sqllt) ;
			$nameei='';
			if( mysqli_num_rows($resst) > 0 )
			{
		 		while( $row = mysqli_fetch_assoc($resst) )
		 		{

		 			$idd 	= $row['user_name'];
		 			
			 		if( $idd == $namee )
			 			{
			 				$nameei	= $row['flname'];
			 				$nameei	= mysqli_real_escape_string($db,$namee);
			 				break;
			 			}
		 		}
		 	}

	//INSERT TABLE
			$sqlii = "INSERT INTO `groups`( `group_key`, `groupname`, `host`, `psw`) VALUES ('$name_','$nameei','$user_table','')";
			mysqli_query($db,$sqlii);
	//FINDING TABLE ID
			$iid=0;
			$sqlll = "SELECT * FROM groups";
			$resss = mysqli_query ($db ,$sqlll) or die (mysqli_error);
			if( mysqli_num_rows($resss) > 0)
					{
						while( $roww = mysqli_fetch_assoc($resss) )
								{
									$iddd =$roww['group_key'];
									if( $iddd == $name_ )
										{
											$iid	= $roww['id'];
											$iid	= mysqli_real_escape_string($db,$iid);
										}
								}
					}

	//CREATING GROUP TABLE
			
			$sql = "CREATE TABLE `epiz_26129805_estashhome`.`$iid` ( `id` INT(18) NOT NULL AUTO_INCREMENT , `content` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL , `date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `Postman` INT(18) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";

			mysqli_query($db,$sql);

	//Join Them
			$sqla = "INSERT INTO `$user_table`( `groupname`) VALUES ($iid)";
			mysqli_query($db,$sqla);
			$sqlai = "INSERT INTO `$namee`( `groupname`) VALUES ($iid)";
			mysqli_query($db,$sqlai);
	//add message
			$sql ="INSERT INTO `$iid` (content,Postman) VALUES ('$passi','$bt')";
			mysqli_query($db,$sql);
			
			header("Location: index.php");
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




