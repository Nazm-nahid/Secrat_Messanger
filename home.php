<?php
	include ('login_validation.php');
?>

<!DOCTYPE html>
<html>

<head>
	<title>টিকিটাকা</title>
	<link rel="shortcut icon" href="favicon.png" type="image/png" media="all">
	<meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="style.css" type="text/css" media="all">
    <link rel="stylesheet" href="st.css" type="text/css" media="all">

</head>

<body>
<div class="login-wrap">
	<div class="login-html">
	    	<h1> <b><i> টিকিটাকা</b></i> </h1>

			<div class='nav'> 

			    <ul>
			      <li><?php
					
					$great="<h3>hello ".$gt."</h3>";
					echo $great; 
				?>
				</li>
			      <li><a href="login.php" class="but">Sign Out</a></li>
			    </ul>
				
				
			</div>


			<div class="card">
		 	
            <form action="http://tikitaka.gq/profile.php" method ="get" >
			 	<input type="submit" name="post" value="Back to Profile" style="background-color: #8a867d;
                  width: 50%; 
						  border: none;
						  color: white;
						  padding: 5px 5px;
                          margin: 10px 0px 0px 0px;
						  text-align: center;
						  text-decoration: none;
						  cursor: pointer;
						  font-size: 13px;
						  ">
			 </form>
		 	
			 <form action="group_create.php" method ="get" >
			 	<input type="submit" name="post" value="Create A Group" style="background-color: #8a867d;
                  width: 50%; 
						  border: none;
						  color: white;
						  padding: 5px 5px;
                          margin: 4px 0px;
						  text-align: center;
						  text-decoration: none;
						  cursor: pointer;
						  font-size: 13px;
						  ">
			 </form>
			 
			 <form action="join_group.php" method ="get">
			 	<input type="submit" name="post" value="Join A Group" style="background-color: #8a867d;
                  width: 50%; 
						  border: none;
						  color: white;
						  padding: 5px 5px;
                          margin: 0px 0px;
						  text-align: center;
						  text-decoration: none;
						  cursor: pointer;
						  font-size: 13px;
						  ">
			 </form>
			 
			 <form action="indivisual.php" method ="get" >
			 	<input type="submit" name="post" value="Message Your Friend" style="background-color: #8a867d; 
                            width: 50%;
						  border: none;
						  color: white;
						  padding: 5px 5px;
                          margin: 4px 0px 10px 0px;
						  text-align: center;
						  text-decoration: none;
						  cursor: pointer;
						  font-size: 13px;
						  ">
			 </form>
             <img src="mes.png" style="width:40%;
             border: none;
						  
						  padding: 5px 5px;
                          margin: -200px 10px 33px 150px;
						  
						 
             
             ">
			 </div>

             

 <?php

 	$sql="SELECT * FROM $user_table ORDER BY reg_date DESC";

 	$res=mysqli_query ($db ,$sql);

 	if(mysqli_num_rows($res)>0){
 		while($row= mysqli_fetch_assoc($res))
 		{
 		    
 			$id =$row['id'];
 			$dd=$row['groupname'];
 			$dql="SELECT * FROM `groups` ORDER BY id DESC" ;
 			$con=mysqli_query ($db ,$dql);
 			$content='';
 			$host_='';
 				if(mysqli_num_rows($con)>0)
 					{
	 					while($ct= mysqli_fetch_assoc($con))
	 						{
	 							$id_=$ct['id']; 
	 							if($id_==$dd)
	 								{
	 									$content=$ct['groupname'];
	 									$host_= $ct['host'];
	 									break;
	 								}
	 						}
	 				}
  		?>	
 			
 			
 			<div class="card">
 				<div class='container'>
 				<p><h4><a href="message.php?id=<?php echo htmlspecialchars($row['id']); ?>">
 					<?php if($host_==$user_table || is_null($host_))echo htmlspecialchars($content); else echo 'Unknown'; ?> </a></h4></p>
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