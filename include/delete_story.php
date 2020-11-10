<?php

  session_start();
  include("connection.php");
  if(!isset($_SESSION['email'])){
	   header("location:../login.php");
    }
	else{
	  $email = $_SESSION['email'];
	  $delete_story= mysqli_query($con," UPDATE test SET story='' WHERE email='$email' ");
	  if($delete_story){
		 echo "success"; 
	  }
	}

?>