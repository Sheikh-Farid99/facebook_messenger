<?php

  session_start();
  include("connection.php");
	
   $email = $_POST['uemail'];
   $password = $_POST['upass'];

   $identify_user = "select * from test where email='$email' AND password='$password'";
   $quary_database = mysqli_query($con,$identify_user);
   $check_user = mysqli_num_rows($quary_database);
   $rnd = rand(545,99999);
	if($check_user==1){
		
		$update_active_status = mysqli_query($con," UPDATE test SET active='active',idnt_id='$rnd' WHERE email='$email' ");
		$_SESSION['email']=$email;
		echo "success";
	}
	else{
		 
		echo "Login failed, please try again";
	}


?>