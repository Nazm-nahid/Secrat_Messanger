<?php

	session_start();
	//CHECK LOGIN VALIDATION
	$bt = $_SESSION['hex']??'-100';
	if( $bt == -100 || $bt == 0 ) {
	    header("Location: login.php");  
	    return ;
	}
	$gt 		= $_SESSION['hexi'];
	$user_table = $_SESSION['hex_user'];

	//____________________________
	include ('dbsql.php');
?>
