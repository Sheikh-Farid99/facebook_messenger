<?php
	
	session_start();
	include("connection.php");
	
	if(!isset($_SESSION['email'])){
	   header("location:../login.php");
    }
	else{
		
		$email = $_SESSION['email'];

		if($_FILES["story_pic"]["name"] != '')
		{
			 $test = explode('.', $_FILES["story_pic"]["name"]);
			 $ext = end($test);
			 $name = rand(100, 9999) . '.' . $ext;

			 $location = '../story_img/' . $name;  
			 move_uploaded_file($_FILES["story_pic"]["tmp_name"], $location);
			 $update_pic = mysqli_query($con," UPDATE test SET story='$name' WHERE email='$email' ");
			 if($update_pic){
				echo "yes";
			 }

		}
	}
?>