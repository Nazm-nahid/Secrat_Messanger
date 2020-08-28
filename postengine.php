<?php

	include ('login_validation.php');

	$tab_name='';
	$ei_id='';
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
	 				$tab_name = $row['groupname'];
	 				break;
	 			}
	 		}

	 	}
	 	else header ("Location: home.php");

	}
	
	if(isset($_POST['post']))
	{
		$content= $_POST['content'];
		if( $content =="")
		{
			header("Location: index.php");
			return;
		}
	
		
		$content = mysqli_real_escape_string($db,$content);
		
		$sql ="INSERT INTO `$tab_name` (content,Postman) VALUES ('$content','$bt')";
		mysqli_query($db,$sql);
		$siql="UPDATE `$user_table` SET `reg_date`=CURRENT_TIMESTAMP WHERE id=$ei_id";
		mysqli_query($db,$siql);
			$loc='message.php?id='.$ei_id;
			//echo $tab_name;
			header("Location: $loc");
	}
?>
