<?php

  session_start();
  include("connection.php");
	if(!isset($_SESSION['email'])){
	   header("location:../login.php");
    }
	else{
		
	   $id = $_POST['id'];
	   $email = $_POST['uemail'];
	   $password = $_POST['upass'];

	   $identify_user = "select * from test where email='$email' AND password='$password'";
	   $quary_database = mysqli_query($con,$identify_user);
	   $check_user = mysqli_num_rows($quary_database);
	   $rnd = rand(545,99999);
		if($check_user==1){
			
		   $active_status = mysqli_query($con," UPDATE test SET active='unactive' WHERE idnt_id='$id'");
			if($active_status){
				session_destroy();
			}
      		session_start();
			$update_active_status = mysqli_query($con," UPDATE test SET active='active',idnt_id='$rnd' WHERE email='$email' ");
			$_SESSION['email']=$email;
			echo "success";
		}
		else{

			echo "Login failed, please inter your correct Email and Password";
		}
	}


?>