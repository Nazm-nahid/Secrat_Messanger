<?php
	//CHECK LOGIN VALIDATION
	include ('login_validation.php');
 	
	
	$group_name = '';
	$host_='';
	if( isset($_GET['id']) )
	{
		$ei_id = $_GET['id'];
	//FINDING GROUP NAME
		$sql = "SELECT * FROM $user_table";
	 	$res = mysqli_query ($db ,$sql);

	 	if( mysqli_num_rows( $res) > 0 ){
	 		while( $row = mysqli_fetch_assoc($res) )
	 		{
	 			$id = $row['id'];
	 			
	 			if( $id == $ei_id )
	 			{
	 				$group_name = $row['groupname'];
	 				
	 				break;
	 			}
	 		}
	 		

	 	}
	 	else header ("Location: home.php");

	}

	$dql="SELECT * FROM `groups` ORDER BY id DESC" ;
 			$con=mysqli_query ($db ,$dql);
 			$group_title='';
 				if(mysqli_num_rows($con)>0)
 					{
	 					while($ct= mysqli_fetch_assoc($con))
	 						{
	 							$id_=$ct['id']; 
	 							if($id_==$group_name)
	 								{
	 									$group_title=$ct['groupname'];
	 									$host_=$ct['host'];
	 									break;
	 								}
	 						}
	 				}
	 			if($host_==$user_table || is_null($host_));
	 		else $group_title='Unknown';
?>


<!DOCTYPE html>
<html>

<head>
	<title>e-Stash</title>
	<link rel="shortcut icon" href="favicon.png" type="image/png" media="all">
	<meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="style.css" type="text/css" media="all">
    <link rel="stylesheet" href="st.css" type="text/css" media="all">

</head>

<body>
	<div class="login-wrap">
		<div class="login-html">
		    	<h1> <b><i> <?php echo htmlspecialchars($group_title); ?></b></i> </h1>
			<div class='nav'> 
	    		<ul>
	      			<li><?php
							$great="<h3>hello ".$gt."</h3>";
							echo $great; 
						?>
					</li>
	      			<li>
	      				<a href="login.php" class="but">Sign Out</a>
	      			</li>
	    		</ul>
			</div>
           
			<form action="postengine.php?id=<?php echo htmlspecialchars($ei_id); ?>" method ="post" class="hay">
	 				<textarea placeholder="Content" name="content" rows="3" cols="17"class="hayy"></textarea> </br>
	 				<input type="submit" name="post" value="Send" class="hayy">
	 		</form>
			<div class="card">
	 			<form action="index.php" >
	 				<input type="submit" value="Back To Home" class="hayy5">
	 			</form>
	 		</div>
	 		<?php

	 			$sql = "SELECT * FROM `$group_name` ORDER BY id DESC";
	 			if(mysqli_query ($db ,$sql))
	 			$res = mysqli_query ($db ,$sql) ;
	 			else echo "bad";

	 			if( mysqli_num_rows($res) > 0 )
	 				{
	 					while( $row = mysqli_fetch_assoc($res) )
	 						{
	 		   	 				$id 	 = $row['id'];
	 							$content = $row['content'];
	 							$date	 = $row['date'];
	 							$postid	 = $row['Postman'];
	 			
	 						?>
	 						<div class="card">
	 							<div class='container'>
	 								<p>
	 									<h4>
		 										<?php echo htmlspecialchars($content); ?> 
		 								</h4>
		 							</p>
	 								<h6 >
	 									<?php echo htmlspecialchars($date); ?>
	 								</h6>
	 							</div>
	 						</div>
	 						<?php
	 						}
	  				}
	 			else echo "NO MESSAGE!!";
			?>
	 	</div>
	</div>
</body>
</html>

