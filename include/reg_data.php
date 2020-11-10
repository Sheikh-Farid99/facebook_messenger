<?php

  include("connection.php");
   $username =  $_POST['uname'];
   $email = $_POST['uemail'];
   $password = $_POST['upass'];

   $check_email = "select * from test where email='$email'";
   $run_email = mysqli_query($con,$check_email);
   $check = mysqli_num_rows($run_email);
   if($check>0){
		   echo "Email already exits, Please use another Email";
	}

	else{
		if($username !="" and $email !="" and  $password !=""){

			$insert_data = "insert into test (username,email,password,pic) values('$username','$email','$password','profile1.jpg')";
			$quary = mysqli_query($con,$insert_data);
			if($quary){

				echo "success";
			}
			else{

				echo "Registration failed, please try again";
			}

		}

		else{

			echo "Registration failed, please file in the blank";
		}
	}


?>