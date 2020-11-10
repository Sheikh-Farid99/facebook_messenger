<?php
	
	session_start();
	include("include/connection.php");
	$email = $_SESSION['email'];
	$update_active_status = mysqli_query($con," UPDATE test SET active='unactive' WHERE email='$email' ");
	session_destroy();
	echo "logout";
?>