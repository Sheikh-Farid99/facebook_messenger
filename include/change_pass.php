<?php
  session_start();
  include("connection.php");
	if(!isset($_SESSION['email'])){
	   header("location:../login.php");
    }
	else{
		
	   $old_email = $_POST['email'];
	   $old_pass= $_POST['opass'];
	   $new_pass= $_POST['npass'];
	   $con_pass= $_POST['cpass'];
	   if($new_pass == $con_pass){
		   
		   $identify_user = "select * from test where email='$old_email' AND password='$old_pass'";
		   $quary_database = mysqli_query($con,$identify_user);
		   $check_user = mysqli_num_rows($quary_database);
		   if($check_user==1){
			   $change_pass = mysqli_query($con," UPDATE test SET password='$new_pass' WHERE email='$old_email'");
				if($change_pass){
					echo "success";
				}
			    else{
					echo "Password Change failed, please try again";
				}
		   }
		    else{
				echo "Password Change failed, please inter valid Email and Password";
			}
	   }
	   else{
		   echo "New Password and Confirm Password Not same";
	   }

	}


?>